<div class="col-md-5">
<div id="map" style="height: 500px"></div>

</div>


<div class="col-md-7">

        <?php 

        
        
        echo form_open('backend/datapoint/update/'.$detail->id); 
        
        
        ?>
        <div class="form-group">
            <label>Nama laundry</label>
            <input name="nama_spbu" value="<?= $detail->nama_laundry ?>" placeholder="Masukan Nama laundry" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" placeholder="Masukan Keterangan" id="" cols="30" rows="10" class="form-control"><?= $detail->keterangan ?></textarea>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Latitude</label>
            <input name="latitude" value="<?= $detail->latitude ?>" id="Latitude" placeholder="Masukan Latitude" class="form-control" required readonly>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Longitude</label>
            <input name="longitude" value="<?= $detail->longitude ?>" id="Longitude" placeholder="Masukan Longitude" class="form-control" required readonly>
        </div>
        </div>
        
       
        <div  class="form-grup ">
            <button type="submit" class="btn btn-primary" >Save</button>
            <button type="reset" class="btn btn-success" >Reset</button>
        </div>
        <?php echo form_close() ?>



        <script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[-6.1779987, 106.8272603];	
}
var map = L.map('map').setView([-6.1779987, 106.8272603], 6);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {

    maxZoom: 18,
    id: 'mapbox/streets-v11'
}).addTo(map);

map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation, {
	draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	map.panTo(position);
});
map.addLayer(marker);
</script>
</div>

