<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
class CI_Shiprocket
{
  protected $CI;
  public function __construct()
  {
    $this->CI = &get_instance();
    $this->CI->load->helper('form');
    $this->CI->load->model("admin/login_model");
    $this->CI->load->model("admin/base_model");
  }
  //===================== GENERATE TOKEN =======================
  public function GenerateSrToken()
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/auth/login',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
         "email": "office.fineoutput@gmail.com",
          "password": "office@123"
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response);
    return $res->token;
  }
  //===================== GET COURIER SERVICEABILITY ========================
  public function GetCourierServiceability($pincode, $wieght, $sub_total, $admin = 0)
  {
    $Token = $this->GenerateSrToken();
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/serviceability/?pickup_postcode=' . SHIPROCKET_PICKUP . '&delivery_postcode=' . $pincode . '&weight=' . $wieght . '&cod=0&order_id=',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $Token . ''
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $decodeed = json_decode($response);
    if (!empty($decodeed->data)) {
      $arr = $decodeed->data->available_courier_companies;
      //------ ascending freight charge
      $names = array();
      foreach ($arr as $index => $val) {
        $names[] = $val->freight_charge;
      }
      array_multisort($names, SORT_ASC, $arr);
      //------ ascending freight charge
      // $courier = [];
      // foreach ($arr as $index => $val) {
      //   if ($val->courier_name == 'Delhivery') {
      //     $courier = $val;
      //     break;
      //   }
      // }
      // if(empty($courier)){
      //   $respone['status'] = false;
      //   $respone['message'] = 'Courier partner are not current deliver at this pincode';
      //   return json_encode($respone);
      // }
      // print_r(json_encode($courier->freight_charge));
      // die();
      $shipping = $arr[0]->freight_charge;
      $courier_id = $arr[0]->courier_company_id;
      // $shipping = $courier->freight_charge;
      // $courier_id = $courier->courier_company_id;
      if ($sub_total > FREESHIPPING) {
        $shipping = 0;
      }

      $new_total = $sub_total + $shipping;
      $res = array('sub_total' => number_format($new_total, 2), 'shipping' => number_format($shipping, 2), 'pincode' => $pincode, 'courier_id' => $courier_id);
      $respone['status'] = true;
      $respone['message'] = 'Shipping Calculated Successfully!';
      $respone['data'] = $res;
      if ($admin == 1) {
        $respone['list'] = $arr;
      }
      return json_encode($respone);
    } else {
      $respone['status'] = false;
      $respone['message'] = $decodeed->message;
      $respone['list'] = [];
      return json_encode($respone);
    }
  }
  //================== CREATE ORDER ==============
  public function createOrder($order1_data, $order_items, $sub_total)
  {
    $Token = $this->GenerateSrToken();
    $newdate = new DateTime($order1_data[0]->date);
    $date =  $newdate->format('Y-m-d h:m');
    if ($order1_data[0]->payment_type == 1) {
      $p_status = 'COD';
    } else {
      $p_status = 'Prepaid';
    }
    $address_data = $this->CI->db->get_where('tbl_user_address', array('id' => $order1_data[0]->address_id))->row();
    // $name = explode(" ", $address_data->name);
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
        "order_id": "' . $order1_data[0]->id . '",
        "order_date": "' . $date . '",
        "billing_customer_name": "' . $address_data->f_name . '",
        "billing_last_name": "' . $address_data->l_name . '",
        "billing_address": "' . $address_data->address . '",
        "billing_city": "' . $address_data->city . '",
        "billing_pincode": "' . $address_data->pincode . '",
        "billing_state": "' . $address_data->state . '",
        "billing_country": "India",
        "billing_email": "' . $address_data->email . '",
        "billing_phone": "' . $address_data->phone . '",
        "shipping_is_billing": true,
        "order_items": ' . json_encode($order_items) . ',
        "payment_method": "' . $p_status . '",
        "sub_total": ' . $sub_total . ',
        "length": ' . $order1_data[0]->length . ',
        "breadth": ' . $order1_data[0]->breadth . ',
        "height": ' . $order1_data[0]->height . ',
        "weight": ' . $order1_data[0]->weight . '
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $Token . ''
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }
  //========= GENERATE AWB ====================
  public function generateAWB($shipment_id, $courier_id)
  {
    $Token = $this->GenerateSrToken();
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/assign/awb',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('shipment_id' => $shipment_id, 'courier_id' => $courier_id),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $Token . ''
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }
  //========= GENERATE LABEL ====================
  public function generateLabel($shipment_id)
  {
    $Token = $this->GenerateSrToken();
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/generate/label',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
        "shipment_id": ["' . $shipment_id . '"]
        }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $Token . ''
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }
  //========= GENERATE PICKUP REQUEST ====================
  public function generatePickupReq($shipment_id, $pickup_date)
  {
    $Token = $this->GenerateSrToken();
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/generate/pickup',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
      	"shipment_id": [' . $shipment_id . '],
      	"pickup_date": ["' . $pickup_date . '"]
      }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $Token . ''
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }
  //========= GENERATE PICKUP REQUEST ====================
  public function trackOrderAWB($awb_code)
  {
    $Token = $this->GenerateSrToken();
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/courier/track/awb/' . $awb_code . '',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $Token . ''
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }
}
