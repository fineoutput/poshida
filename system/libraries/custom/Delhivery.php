<?php
if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}
class CI_Delhivery
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
  public function FetchWaybill()
  {
    $Token = DELIVERY_TOKEN;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://' . DELIVERY_URL . '/waybill/api/bulk/json/?cl=Poshida&count=1',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Content-Type ' . 'application/json',
        'Authorization: Token ' . $Token . ''
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }
  //===================== GET COURIER SERVICEABILITY ========================
  public function GetCourierServiceability($pincode, $total_weight, $sub_total, $admin = 0)
  {
    $Token = DELIVERY_TOKEN;
    //----- pincode serviceability ----------
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://' . DELIVERY_URL . '/c/api/pin-codes/json/?filter_codes=' . $pincode, //local
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Content-Type ' . 'application/json',
        'Authorization: Token ' . $Token . ''
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $decodeed = json_decode($response);
    // print_r($decodeed);
    // die();
    if (!empty($decodeed->delivery_codes)) {
      // $waybill_number = $this->FetchWaybill();
      // if (empty($waybill_number)) {
      //   $respone['status'] = false;
      //   $respone['message'] = 'Some error occurred';
      //   return json_encode($respone);
      // }
      // $waybill_number = $this->FetchWaybill();
      //----- calculate shipping  ----------
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://' . DELIVERY_URL . '/api/kinko/v1/invoice/charges/.json?md=E&ss=Delivered&d_pin=' . DELIVERY_PICKUP . '&o_pin=' . $pincode . '&cgm=0.5&pt=Pre-paid&cod=0',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
          'Content-Type ' . 'application/json',
          'Authorization: Token ' . $Token . ''
        ),
      ));
      $response2 = curl_exec($curl);
      curl_close($curl);
      $decodeed2 = json_decode($response2);
      if (!empty($decodeed2)) {
        $shipping = $decodeed2[0]->total_amount;
        // echo $shipping;die();
        if ($sub_total > FREESHIPPING) {
          $shipping = 0;
        }

        $new_total = $sub_total + $shipping;
        $res = array('sub_total' => number_format($new_total, 2), 'shipping' => number_format($shipping, 2), 'pincode' => $pincode,);
        $respone['status'] = true;
        $respone['message'] = 'Shipping Calculated Successfully!';
        $respone['data'] = $res;
        return json_encode($respone);
      } else {
        $respone['status'] = false;
        $respone['message'] = 'Some error occurred';
        $respone['list'] = [];
        return json_encode($respone);
      }
    } else {
      $respone['status'] = false;
      $respone['message'] = 'Courier partner are not current deliver at this pincode';
      $respone['list'] = [];
      return json_encode($respone);
    }
  }
  //================== CREATE ORDER ==============
  public function createOrder($order1_data, $order_items, $sub_total)
  {
    $Token = DELIVERY_TOKEN;
    $newdate = new DateTime($order1_data[0]->date);
    $date =  $newdate->format('Y-m-d h:m');
    if ($order1_data[0]->payment_type == 1) {
      $p_status = 'COD';
    } else {
      $p_status = 'Prepaid';
    }
    $address_data = $this->CI->db->get_where('tbl_user_address', array('id' => $order1_data[0]->address_id))->row();
    // $name = explode(" ", $address_data->name);
    $name = $address_data->f_name . ' ' . $address_data->l_name;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://' . DELIVERY_URL . '/api/cmu/create.json',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'format=json&data={
  "shipments": [
    {
      "name": "' . $name . '",
      "add": "' . $address_data->address . '",
      "pin": "' . $address_data->pincode . '",
      "city": "' . $address_data->city . '",
      "state":"' . $address_data->state . '",
      "country":  "India",
      "phone": "' . $address_data->phone . '",
      "order": "' . $order1_data[0]->id . '",
      "payment_mode": "' . $p_status . '",
      "return_pin": "' . $address_data->pincode . '",
      "return_city": "' . $address_data->city . '",
      "return_phone": "' . $address_data->phone . '",
      "return_add": "' . $address_data->address . '",
      "return_state": "' . $address_data->state . '",
      "return_country": "India",
      "hsn_code": "",
      "cod_amount": "' . $sub_total . '",
      "order_date": "' . $date . '",
      "total_amount": "' . $sub_total . '",
      "seller_add": "",
      "seller_name": "",
      "seller_inv": "",
      "quantity": "",
      "waybill": "' . $order1_data[0]->waybill_number . '",
      "shipment_width": "' . $order1_data[0]->width . '",
      "shipment_height": "' . $order1_data[0]->height . '",
      "weight": "' . $order1_data[0]->weight . '",
      "seller_gst_tin": "",
      "shipping_mode": "' . $order1_data[0]->shipment_mode . '",
      "address_type": ""
    }
  ],
  "pickup_location": {
    "name": "Poshida",
    "add": "South Delhi",
    "city": "to1",
    "pin_code": 110017,
    "country": "India",
    "phone": "5412546857"
  }
}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Token ' . $Token . ''
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }
  //========= generateLabel  ====================
  public function generateLabel($waybill)
  {
    $Token = DELIVERY_TOKEN;

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://' . DELIVERY_URL . '/api/p/packing_slip?wbns=' . $waybill . '&pdf=true',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Token ' . $Token . ''
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }

  //========= GENERATE PICKUP REQUEST ====================
  public function generatePickupReq($package_count, $pickup_date, $pickup_time)
  {
    $Token = DELIVERY_TOKEN;

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://' . DELIVERY_URL . '/fm/request/new/',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => '{
      "pickup_location": "Poshida2",
      "expected_package_count":  "' . $package_count . '",
      "pickup_date": "' . $pickup_date . '",
      "pickup_time":  "' . $pickup_time . '"
}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Token ' . $Token . ''
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $res = json_decode($response);
    return $res;
  }
}
