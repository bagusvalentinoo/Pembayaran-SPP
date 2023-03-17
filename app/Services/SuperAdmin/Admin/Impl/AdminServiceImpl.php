<?php

namespace App\Services\SuperAdmin\Admin\Impl;

use App\Mail\User\SuperAdmin\School\SchoolMail;
use App\Models\User\Admin;
use App\Models\User\User;
use App\Services\SuperAdmin\Admin\AdminService;
use App\Traits\Services\ServiceResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminServiceImpl implements AdminService
{
    use ServiceResource;

    private $userModel, $adminModel;

    public function __construct(User $userModel, Admin $adminModel)
    {
        $this->userModel = $userModel;
        $this->adminModel = $adminModel;
    }

    /**
     * Get Admins
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAdmins(Request $request)
    {
        $admins = $this->adminModel->with(['school'])->get();

        return $admins;
    }

    /**
     * Create Admin Instead of User
     *
     * @param Request $request
     * @param $school
     * @return mixed
     */
    public function createAdmin(Request $request, $school, $randomPassword)
    {
        $carbonNow = Carbon::now();
        $strLowerSchoolName = $this->setStrReplace(' ', '', $school->name);
        $formatSchoolName = $this->setStrToLower($strLowerSchoolName) . '_admin_' .
            $this->setGeneratedRandomLastDigitsAdminUsername(0, 9999, 4);
        $userAdminName = $this->setStrReplace('_', ' ', $this->setStrToUpper($formatSchoolName));

        $userAdmin = $this->userModel->create(
            array_filter([
                'name' => $userAdminName,
                'username' => $formatSchoolName,
                'email' => $school->email,
                'photo_profile' => 'public/images/user/admin/photo_profile/default_photo_profile.jpg',
                'password' => Hash::make($randomPassword),
                'email_verified_at' => $carbonNow->format('Y-m-d H:i:s')
            ], customArrayFilter())
        );
        $userAdmin->assignRole(['Admin']);

        $userAdmin->admin()->create([
            'user_id' => $userAdmin->id,
            'school_id' => $school->id,
            'name' => $userAdminName,
            'phone_number' => $request->input('admin_phone_number'),
            'address' => $request->input('admin_address')
        ]);

        $data = [
            'subject' => 'Akun Admin Pembayaran SPP',
            'username' => $userAdmin->username,
            'password' => $randomPassword
        ];
        Mail::to($userAdmin->email)->send(new SchoolMail($data));

        return $userAdmin;
    }
}
