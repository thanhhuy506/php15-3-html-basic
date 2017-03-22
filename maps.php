<!DOCTYPE html>
<html>
<body>

<p id="demo">Kích vào button để lấy vị trí.</p>

<button onclick="getLocation()">Lấy vị trí</button>

<div id="mapholder"></div>

<script src="https://maps.google.com/maps/api/js?sensor=false"></script>

<script>
var x = document.getElementById("demo");
function getLocation() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition, showError);
} else {
x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
}
}

function showPosition(position) {
lat = position.coords.latitude;
lon = position.coords.longitude;
latlon = new google.maps.LatLng(lat, lon)
mapholder = document.getElementById('mapholder')
mapholder.style.height = '250px';
mapholder.style.width = '500px';

var myOptions = {
center:latlon,zoom:14,
mapTypeId:google.maps.MapTypeId.ROADMAP,
mapTypeControl:false,
navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
}

var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
}

function showError(error) {
switch(error.code) {
case error.PERMISSION_DENIED:
x.innerHTML = "Người sử dụng từ chối cho xác định vị trí."
break;
case error.POSITION_UNAVAILABLE:
x.innerHTML = "Thông tin vị trí không có sẵn."
break;
case error.TIMEOUT:
x.innerHTML = "Yêu cầu vị trí người dùng vượt quá thời gian quy định."
break;
case error.UNKNOWN_ERROR:
x.innerHTML = "Một lỗi xảy ra không rõ nguyên nhân."
break;
}
}
</body>
</html>
