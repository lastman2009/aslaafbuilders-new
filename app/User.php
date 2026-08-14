<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserCharacterType;
use App\Role;
use Auth;
use App\Property;
use App\AgencyWebsite;
use App\AgencyOffice;
use App\AgencyStaff;

use App\Theme;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $events =[
    'created' =>Events\NewUser::class
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function UserCharacterType()
    {
        return $this->hasMany(UserCharacterType::class);
    }
    public function UserPortfolio(){
        return $this->hasMany(UserPortfolio::class);
    }

    public function getRole(){

        // return Role::find(Auth::user())->name;
        $check=Auth::User()->role_id;
        $role_check = Role::find($check)->name;
        return $role_check;
    }
    public function getRoleApi($id){

        // return Role::find(Auth::user())->name;

        $check=User::find($id)->role_id;
        $role_check = Role::find($check)->name;
        return $role_check;
    }

    public function roleId()
    {
        return Auth::User()->role_id;
    }

    public function checkUserWebsite()
    {
         $website =AgencyWebsite::where('user_id' ,Auth::id())->where('status' ,1)->first();

         if($website ==null)
         {
            return false;
         }
         return true;


    }

    public function websitestaffandoffice()
    {
        $website =AgencyWebsite::where('user_id' ,Auth::id())->where('status' ,1)->first();
        $office =AgencyOffice::where('agency_website_id', $website->id)->where('status' ,1)->first();
        $staff =AgencyStaff::where('agency_website_id',$website->id)->where('status' ,1)->first();
   
         // return $office;
        if($office !=null  && $staff !=null)
        {
            return true;
        }
        else
        {
            return false;
            
        }

        
    }

    /**
     * First profile image filename for a user, or "" when there isn't one.
     *
     * The `image` column holds a JSON array of filenames, but it is NULL for
     * the vast majority of users (they never uploaded a picture). The previous
     * one-liner assumed the user exists, that `image` is valid JSON, and that
     * the decoded array is non-empty — on PHP 8 a NULL image made
     * json_decode() return null and `[0]` threw "Trying to access array offset
     * on null", taking down the whole blog detail page over one commenter with
     * no avatar. Callers already treat "" as "use the default avatar".
     */
    public static function getUserImage($id)
    {
        $user = User::find($id);

        if ($user === null || empty($user->image)) {
            return "";
        }

        $images = json_decode($user->image);

        if (!is_array($images) || empty($images)) {
            return "";
        }

        return reset($images);
    }

    /**
     * Display name for a user, or "" when the account no longer exists
     * (deleted users still leave their id behind on old comments).
     */
    public static function getUserName($id)
    {
        $user = User::find($id);

        if ($user === null) {
            return "";
        }

        return trim($user->first_name . ' ' . $user->last_name);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public static function checkVendor($id)
    {
        $vendor_id =CharacterType::where('name' ,'vendor')->first()->id;
        $check =UserCharacterType::where('user_id',$id)->where('character_type_id' ,$vendor_id)->where('status',1)->first();
        if($check != null){
            return true;
        }else{
            return false;
        }
    }

   public static function checkArchitecture($id)
    {
        $architecture_id =CharacterType::where('name' ,'architecture')->first()->id;
        $check =UserCharacterType::where('user_id',$id)->where('character_type_id' ,$architecture_id)->where('status',1)->first();
        if($check != null){
            return true;
        }else{
            return false;
        }
    } 

     public static function checkAgent($id)
    {
        $agent_id =CharacterType::where('name' ,'agent')->first()->id;
        $check =UserCharacterType::where('user_id',$id)->where('character_type_id' ,$agent_id)->where('status',1)->first();
        // dd($check);
        // return $check;
        if($check != null){
            return true;
        }else{
            return false;
        }
    } 

     public static function getFirstName($id)
    {
            return User::find($id)->first_name;
    } 
    
     public function updateCount($purpose)
    {
        if($purpose == 4)
        {
            $this->project_count += 1;
            $this->update();
        }
        else if($purpose == 1 || $purpose == 2 || $purpose == 3)
        {
            $this->property_count += 1;
            $this->update();
        }
        if($purpose == 25 || $purpose == 26 || $purpose == 27 || $purpose == 28 || $purpose == 29 || $purpose == 30 || $purpose == 31)
        {
            $this->plot_count += 1;
            $this->update();
        }
    }
    
}
