<html>
 <head>
  <title>Export Data to Excel in Laravel using Maatwebsite</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

 </head>
 <body>
  <br />
  <div class="container"> 
   <h3 align="center">Export Data to Excel in Laravel 8</h3><br />
   <div align="center">
    <a class="btn btn-primary" id="download">Export to PDF</a>
    <a class="btn btn-primary" href="{{ URL::to('/ExportPdf') }}">Export to PDF</a>
    <a href="{{ url('/Export') }}" class="btn btn-success">Export to Excel</a>
    <a id="excel" class="btn btn-danger">Export to Excel by AJAX</a>
   </div>
   <br />
   <div id="invoice" class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr>
      <td>name</td>
      <td>lastname</td>
      <td>fname</td>
     </tr>
     @foreach($data as $item)
     <tr>
      <td>{{ $item->name }}</td>
      <td>{{ $item->lastname }}</td>
      <td>{{ $item->fname }}</td>
     </tr>
     @endforeach
    </table>
   </div>
   
  </div>
  <script>
 $('#excel').on('click',function(){
$.ajax({
     type : 'GET',
     url : '/Export',
     success:function(data){
        //  console.log("success", data)
    window.location.href = '/Export';
     }
});
})

</script>

<script>
window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'myfile.txt',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                // jspdf({format: 'a6',unit: 'mm',orientation: [l | p] });
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>
 </body>
</html> 