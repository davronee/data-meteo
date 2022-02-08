<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class OneIdController extends Controller
{
    public function login()
    {
        return view('oneidlogin');
    }

    public function OneIdLogin()
    {
        $authorizationurl = "https://sso.egov.uz/sso/oauth/Authorization.do";
        $clientid = "gidrometeorologiya";
        $clientsecret = "aGTZZZl/Ji6comWwxflksw==";
        $scope = "gidrometeorologiya";
        $stateArr = array('method' => 'IDPW');
        $states = json_encode($stateArr);
        $state = base64_encode($states);

        return view('oneid')
            ->with('authorizationurl', $authorizationurl)
            ->with('clientid', $clientid)
            ->with('clientsecret', $clientsecret)
            ->with('scope', $scope)
            ->with('stateArr', $stateArr)
            ->with('state', $state);
    }

    public function Oneid_get_logged()
    {
        $authorizationurl = "https://sso.egov.uz/sso/oauth/Authorization.do";
        $clientid = "gidrometeorologiya";
        $clientsecret = "aGTZZZl/Ji6comWwxflksw==";
        $scope = "gidrometeorologiya";

        $ch = curl_init();
        $authCode = $_GET["code"];

        // dd($authCode);

        curl_setopt($ch, CURLOPT_URL, $authorizationurl);
        curl_setopt($ch, CURLOPT_POST, true);
        $param = "grant_type=" . rawurlencode('one_authorization_code');
        $param = $param . "&client_id=" . rawurlencode($clientid);
        $param = $param . "&client_secret=" . rawurlencode($clientsecret);
        $param = $param . "&code=" . rawurlencode($authCode);
        $param = $param . "&scope=" . rawurlencode($scope);
        $param = $param . "&redirect_uri=" . rawurlencode(route('service.index'));

        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);
        if (!isset($obj))
            return url('/');

        $access_token = $obj->{'access_token'};


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $authorizationurl);
        curl_setopt($ch, CURLOPT_POST, true);

        $param = "grant_type=" . rawurlencode('one_access_token_identify');
        $param = $param . "&client_id=" . rawurlencode($clientid);
        $param = $param . "&client_secret=" . rawurlencode($clientsecret);
        $param = $param . "&scope=" . rawurlencode($scope);
        $param = $param . "&access_token=" . rawurlencode($access_token);


        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $results = curl_exec($ch);
        curl_close($ch);

        $one_id_data = json_decode($results);
//	    dd($one_id_data);

        $user = \App\Models\User::where('user_id', $one_id_data->user_id)->first();
        if (!isset($user->user_id)) {
            //dd($user);
            $usersave = new \App\Models\User();
            if (isset($one_id_data->user_id))
                $usersave->name = $one_id_data->user_id;
            if (isset($one_id_data->email))
                $usersave->email = $one_id_data->email;
            if ($one_id_data->valid == "true")
                $usersave->valid = true;
            else $usersave->valid = false;
            if (isset($one_id_data->tem_adr))
                $usersave->tem_adr = $one_id_data->tem_adr;
            if (isset($one_id_data->gd))
                $usersave->gd = $one_id_data->gd;
            if (isset($one_id_data->per_adr))
                $usersave->per_adr = $one_id_data->per_adr;
            if (isset($one_id_data->tin))
                $usersave->tin = $one_id_data->tin;
            if (isset($one_id_data->pport_issue_date))
                $usersave->pport_issue_date = $one_id_data->pport_issue_date;
            if (isset($one_id_data->sur_name))
                $usersave->sur_name = $one_id_data->sur_name;
            if (isset($one_id_data->first_name))
                $usersave->first_name = $one_id_data->first_name;
            if (isset($one_id_data->user_id))
                $usersave->user_id = $one_id_data->user_id;
            if (isset($one_id_data->birth_date))
                $usersave->birth_date = $one_id_data->birth_date;
            if (isset($one_id_data->user_type))
                $usersave->user_type = $one_id_data->user_type;
            if (isset($one_id_data->pport_expr_date))
                $usersave->pport_expr_date = $one_id_data->pport_expr_date;
            if (isset($one_id_data->natn))
                $usersave->natn = $one_id_data->natn;
            if (isset($one_id_data->pport_no))
                $usersave->pport_no = $one_id_data->pport_no;
            if (isset($one_id_data->mid_name))
                $usersave->mid_name = $one_id_data->mid_name;
            if (isset($one_id_data->mob_phone_no))
                $usersave->mob_phone_no = $one_id_data->mob_phone_no;
            if (isset($one_id_data->pin))
                $usersave->pin = $one_id_data->pin;
            if (isset($one_id_data->pport_issue_place))
                $usersave->pport_issue_place = $one_id_data->pport_issue_place;
            if (isset($one_id_data->full_name))
                $usersave->full_name = $one_id_data->full_name;
            $usersave->save();

            Auth::login($usersave);

            return redirect(url('/service'));

        } else {
            Auth::login($user);
            return redirect(url('/service'));


        }


    }
}
