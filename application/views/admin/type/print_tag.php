<!DOCTYPE html>
<html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <!-- Css file include -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Tiara Tag</title>
  <style>
    p {
      font-family: Calibri (Body);
    }

    span {
      font-family: Calibri (Body);
    }

    h2 {
      font-family: Calibri (Body);
    }
  </style>
</head>

<body style="padding-top:2rem;">
  <div class="container">
    <div class="row justify-content-center">
      <?
                  $this->db->select('*');
      $this->db->from('tbl_colour');
      $this->db->where('id',$type_data->colour_id);
      $color_data= $this->db->get()->row();
                  $this->db->select('*');
      $this->db->from('tbl_size');
      $this->db->where('id',$type_data->size_id);
      $size_data= $this->db->get()->row();
      ?>
      <div class="col-sm-5 text-center p-0" style="min-width:600px;min-height:auto;border: 1px solid #000;border-collapse: collapse;" id="html-content-holder">
        <div style="border: 1px solid #000;padding: 10px 0px;font-size:30px;">
          <p style="margin-bottom:0px;font-size:30px;"><b>MRP</b> <span>(Incl. of all taxes)</span> </p>
          <h1 style="font-size:40px;"><b>Rs.</b><?=$type_data->retailer_mrp?></h1>
        </div>
        <div style="border: 1px solid #000;padding: 5px 0px;">
          <p style="text-align:left;margin-left:5px;margin-bottom:0px;font-weight:500;font-size:30px;">Product Code :
            <span style="margin-left:5px;font-size:30px;"><?=$p_data->sku?></span>
          </p>
          <div class="row">
          <div class="col-md-5 p-0 ml-3">
          <span style="text-align:left;margin-left:5px;margin-bottom:0px;font-weight:500;float:left;font-size:30px;">Product Name :
       </span>
          </div>
          <div class="col-md-6 p-0">
          <span style="margin-left:-36px;float:left;font-size:30px;text-align:left"><?=$p_data->name?></span> </span>
          </div>

        </div>
          <p style="text-align:left;margin-left:5px;margin-bottom:0px;font-weight:500;font-size:30px;">Size :
            <span style="margin-left:5px;font-size:30px;"><?=$size_data->name?></span>
          </p>
          <p style="text-align:left;margin-left:5px;margin-bottom:0px;font-weight:500;font-size:30px;">Color :
            <span style="margin-left:5px;font-size:30px;"><?=$color_data->colour_name?></span>
          </p>
          <p style="text-align:left;margin-left:5px;margin-bottom:0px;font-weight:500;font-size:30px;">Type Code :
            <span style="margin-left:5px;font-size:30px;"><?=$type_data->t_code?></span>
          </p>
          <img src="<?=base_url().$type_data->barcode_tag_image?>" class="img-fluid mt-4 px-1" style="border:none" />
        </div>
        <div style="border: 1px solid #000;border-collapse: collapse;">
          <img src="<?=base_url()?>assets/frontend/images/tiara_logo.png" alt="" class="img-fluid" style="margin-top: -0px;">
          <h5 style="margin-top: 0px;font-weight:bold;">TIARASTORE</h5>
          <p style="text-align:center;font-weight:500;text-transform:uppercase;font-size:25px;margin-top:-5px;">For Complaints/Feedback, <br> Please Write Us To Our Customer Care <br> Executive At Bellow Address Or <br> Email Address: </p>
          <a href="contactus@tiarastore.co.in" style="font-size: 25px;text-decoration:underline;color:blue;font-weight:800;">contactus@tiarastore.co.in</a>
          <p style="font-size: 23px;font-weight:bold;">B 14,15, SOURAV TOWER, AMARPALI CIRCLE, VAISHALI <br> NAGAR, JAIPUR, PIN : 302021</p>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="name" id="name" value="<?=$p_data->name?>-<?=$type_data->t_code?>">
  <div class="col-md-12 text-center mt-5">
    <a id="btn_convert1" onclick="getPDF();"  href="javascript:void(0)"><button class="btn btn-primary" style="background-color:#ff9b98;border:none">Download</button></a>
  </div>
  </div><br>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="<?=base_url()?>assets/html2canvas.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
</script><script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script>
function getPDF () {
  var name = $('#name').val();
        return html2canvas($('#html-content-holder'), {
            background: "#ffffff",
            onrendered: function(canvas) {
                var myImage = canvas.toDataURL("image/jpeg,1.0");
                // Adjust width and height
                var imgWidth =  (canvas.width * 80) / 260;
                var imgHeight = (canvas.height * 58) / 240;
                // jspdf changes
                var pdf = new jsPDF('p', 'mm', 'a4');
                pdf.addImage(myImage, 'png', 15, 2, imgWidth, imgHeight); // 2: 19
                pdf.save(""+name+".pdf");
            }
        });
    }
  // document.getElementById("btn_convert1").addEventListener("click", function() {
  //   html2canvas(document.getElementById("html-content-holder")).then(function(canvas) {
  //     var anchorTag = document.createElement("a");
  //     dpi: 250,
  //     document.body.appendChild(anchorTag);
  //     var name = $('#name').val();
  //     anchorTag.download = name + ".pdf";
  //     anchorTag.href = canvas.toDataURL();
  //     anchorTag.target = '_blank';
  //     anchorTag.click();
  //     // window.history.back()
  //   });
  // });
</script>

</html>
