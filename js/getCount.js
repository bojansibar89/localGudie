function getCount() {
$.get('getCountFromUpload.php', function(data) {
  alert(data);
});
}