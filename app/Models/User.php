<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    /////////////STATIC VALUES////////
    const STATIC_ADMIN_DATABASE_ID = 1;
    const STATIC_CUSTOMER_DATABASE_ID = 2;
    const STATIC_SERVICEPROFIDER_DATABASE_ID = 3;
    //////////////////////////////////

    const ROLE_ADMIN = 1;
    const ROLE_CUSTOMER = 2;
    const ROLE_SERVICE_PROVIDER = 3;
    const GUEST = 3;


    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_NEW = 2;



    const MALE = 1;
    const FEMALE = 2;
    const OTHER = 3;
    const UPLOAD_PICTURE_PATH = "/public/images";

    const USER_VERIFIED = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'business_name',
        'phone',
        'email',
        'dob',
        'latitude',
        'longitude',
        'address',
        'city',
        'state',
        'pincode',
        'country',
        'country_code',
        'country_short_code',
        'spoken_language',
        'other_spoken_language',
        'primary_mode_of_transport',
        'experience', 'travel_distance',
        'earliest_start_date',
        'aspire_to_achieve',
        'hobbies',
        'long_term_goal',
        'goal',
        'profile_image',
        'cover_image',
        'is_notification',
        'role_id',
        'status',
        'created_by',
        'email_verified_at',
        'password',
        'form_step',
        'email_verified_token',
        'whatsapp_no',
        'snapchat_link',
        'instagram_link',
        'twitter_link',
        'license_cr_no',
        'license_cr_photo',
        'description',
        'profile_video',
        'profile_image',
        'nationality',
        'whatspp_no'
    ];
    public function Favouriteservice()
    {
        return $this->hasOne(FavouriteServices::class, 'user_id', 'id');
    }
    public function Rating()
    {
        return $this->hasMany(UserRating::class, 'user_id', 'id');
    }
    public function education()
    {
        return $this->hasOne(EducationDetail::class, 'user_id', 'id');
    }
    public function workexperience()
    {
        return $this->hasOne(WorkExperience::class, 'user_id', 'id');
    }

    public function serviceDetail()
    {
        return $this->hasOne(Services::class, 'user_id', 'id');
    }
    //get category detail
    public function servicecategoryDetail($id)
    {
        return ServiceCategory::where('id','=',$id)->first();
    }
    public function files()
    {
        return $this->hasOne(Files::class, 'created_by')->where('model_type', 'App/Models/User');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function favourite($id, $userId)
    {
        return FavouriteServices::where(['service_id' => $id, 'user_id' => $userId])->first();
    }
    public function jsonData()
    {
        $json = [];
        $json['id'] = $this->id;
        $json['first_name'] = $this->first_name;
        $json['last_name'] = $this->last_name;
        $json['email'] = $this->email;
        $json['phone'] = $this->phone;
        $json['dob'] = $this->dob ?? '';
        if ($this->roles->first()->id == User::ROLE_CUSTOMER) {
            $json['nationality'] = $this->nationality;
            $json['address'] = $this->address;
        }
        if ($this->roles->first()->id == User::ROLE_SERVICE_PROVIDER) {

            $json['business_name'] = $this->business_name ?? '';
        }
        return $json;
    }


    public function customerProfile()
    {
        $json = [];
        $json['id'] = $this->id;
        $json['first_name'] = $this->first_name;
        $json['last_name'] = $this->last_name;
        $json['dob'] = $this->dob ?? '';
        $json['nationality'] = $this->nationality;
        $json['address'] = $this->address;
        $json['email'] = $this->email;
        $json['country_code'] = $this->country_code;
        $json['phone'] = $this->phone;
        $json['latitude'] = $this->latitude;
        $json['longitude'] = $this->longitude;
        return $json;
    }

    public function serviceProviderProfile()
    {
        $json = [];
        $json['email'] = $this->email?? '';
        $json['dob'] = $this->dob?? '';
        $json['business_name'] = $this->business_name?? '';
        $json['first_name'] = $this->first_name?? '';
        $json['last_name'] = $this->last_name?? '';
        if (!empty($this->profile_image))
            $json['profile_image'] = url('') . '/profile_image/' . $this->profile_image;
        else
            $json['profile_image'] = "";
        if (!empty($this->files->file_name))
            $json['video'] = url('') . '/videos/' . $this->files->file_name;
        else
            $json['video'] = "";

        if (!empty($this->license_cr_photo))
            $json['license_cr_photo'] = url('') . '/license_image/' . $this->license_cr_photo;
        else
            $json['license_cr_photo'] = "";

        $json['service_provider_type '] = $this->service_provider_type;
        $json['nationality'] = $this->nationality;
        $json['address'] = $this->address;
        $json['country_code'] = $this->country_code;
        $json['phone'] = $this->phone;
        $json['latitude'] = $this->latitude;
        $json['longitude'] = $this->longitude;
        $json['whatsapp_no'] = $this->whatsapp_no?? '';
        $json['snapchat_link'] = $this->snapchat_link?? '';
        $json['instagram_link'] = $this->instagram_link?? '';
        $json['twitter_link'] = $this->twitter_link?? '';
        $json['license_cr_no'] = $this->license_cr_no?? '';
        $json['description'] = $this->description?? '';
        $json['rating'] = $this->rating ?? 0;
        $json['is_favourite'] = empty($this->Favouriteservice->user_id) ? 0 : 1;
        //  //get categoryname
        $catname=$this->servicecategoryDetail($this->serviceDetail->cat_id);
        $json['category'] = $catname->name;
         //get subcategory name
         $subcatname=$this->servicecategoryDetail($this->serviceDetail->sub_cat_id);
         $json['subcategory'] = $subcatname->name;
         $json['price_per_hour'] = $this->serviceDetail->price_per_hour;
         $json['price_per_day'] = $this->serviceDetail->price_per_day;
         $json['price_per_month'] = $this->serviceDetail->price_per_month;

        if (!empty($this->education)) {
            $json['institute_name'] = $this->education->institute_name;
            $json['degree'] = $this->education->degree;
            $json['start_date'] = $this->education->start_date;
            $json['end_date'] = $this->education->end_date;
        } else {
            $json['institute_name'] = "";
            $json['degree'] = "";
            $json['start_date'] = "";
            $json['end_date'] = "";
        }

        if (!empty($this->workexperience)) {
            $json['no_of_years'] = $this->workexperience->no_of_years;
            $json['brief_of_experience'] = $this->workexperience->brief_of_experience;
        } else {
            $json['no_of_years'] =  "";
            $json['brief_of_experience'] = "";
        }

        return $json;
    }
    public function RatingResponse()
    {
        $userId = auth()->user()->id;
        if ($this->roles->first()->id == User::ROLE_SERVICE_PROVIDER) {
            $favourite = $this->favourite($this->id, $userId);
            $json = [];
            $json['id'] = $this->id;
            $json['first_name'] = $this->first_name;
            $json['last_name'] = $this->last_name;
            $json['profile_image'] = env('APP_URL') . 'public/profile_image/' . $this->profile_image;
            $json['rating'] = $this->rating ?? 0;
            $json['is_favourite'] = empty($favourite) ? 0 : 1;
            $json['whatsapp_no'] = $this->whatsapp_no;
            $json['snapchat_link'] = $this->snapchat_link;
            $json['instagram_link'] = $this->instagram_link;
            $json['twitter_link'] = $this->twitter_link;
            $json['description'] = $this->description;
            $json['phone'] = $this->phone;
            $json['price_per_hour'] = $this->price_per_hour ?? 0;
            return $json;
        }
    }
   
}
