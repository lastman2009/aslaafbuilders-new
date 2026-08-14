<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaxRulePost;
use App\Society;
use App\TaxRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TaxRuleController extends Controller
{
    public function index(Request $request)
    {
        $query = TaxRule::query()->with('society');

        if ($request->filled('city')) {
            $query->where('city', $request->input('city'));
        }

        if ($request->filled('society_id')) {
            $query->where('society_id', $request->input('society_id'));
        }

        $taxRules = $query->orderBy('tax_code')->orderByDesc('priority')->paginate(30)->withQueryString();
        $societies = Society::orderBy('name')->get();
        $cities = TaxRule::whereNotNull('city')->distinct()->pluck('city');

        return view('admin.tax-rules.index', compact('taxRules', 'societies', 'cities'));
    }

    public function create()
    {
        $societies = Society::active()->with('blocks')->orderBy('name')->get();

        return view('admin.tax-rules.create', compact('societies'));
    }

    public function store(StoreTaxRulePost $request)
    {
        TaxRule::create($request->validated());

        return redirect()->route('admin.tax-rules.index')->with('success', 'Tax rule created.');
    }

    public function edit(TaxRule $taxRule)
    {
        $societies = Society::active()->with('blocks')->orderBy('name')->get();

        return view('admin.tax-rules.edit', compact('taxRule', 'societies'));
    }

    public function update(StoreTaxRulePost $request, TaxRule $taxRule)
    {
        $taxRule->update($request->validated());

        return redirect()->route('admin.tax-rules.index')->with('success', 'Tax rule updated.');
    }

    public function destroy(TaxRule $taxRule)
    {
        $taxRule->delete();

        return redirect()->route('admin.tax-rules.index')->with('success', 'Tax rule deleted.');
    }

    public function toggleStatus(TaxRule $taxRule)
    {
        $taxRule->update(['status' => $taxRule->status ? 0 : 1]);

        return redirect()->back()->with('success', 'Tax rule status updated.');
    }

    public function clone(TaxRule $taxRule)
    {
        $copy = $taxRule->replicate();
        $copy->tax_name = $taxRule->tax_name . ' (Copy)';
        $copy->status = 0;
        $copy->save();

        return redirect()->route('admin.tax-rules.edit', $copy)->with('success', 'Tax rule cloned — review and activate.');
    }

    public function exportCsv(): StreamedResponse
    {
        $columns = (new TaxRule())->getFillable();

        $filename = 'tax_rules_' . date('Y_m_d_His') . '.csv';

        return response()->streamDownload(function () use ($columns) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $columns);

            TaxRule::query()->orderBy('id')->chunk(200, function ($rules) use ($handle, $columns) {
                foreach ($rules as $rule) {
                    fputcsv($handle, array_map(fn ($col) => $rule->{$col}, $columns));
                }
            });

            fclose($handle);
        }, $filename, ['Content-Type' => 'text/csv']);
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $handle = fopen($request->file('csv_file')->getRealPath(), 'r');
        $header = fgetcsv($handle);
        $imported = 0;

        DB::beginTransaction();

        try {
            while (($row = fgetcsv($handle)) !== false) {
                $data = array_combine($header, $row);
                TaxRule::create($data);
                $imported++;
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            fclose($handle);

            return redirect()->route('admin.tax-rules.index')->with('error', 'Import failed: ' . $e->getMessage());
        }

        fclose($handle);

        return redirect()->route('admin.tax-rules.index')->with('success', "Imported {$imported} tax rules.");
    }
}
