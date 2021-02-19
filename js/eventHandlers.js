window.addEventListener('DOMContentLoaded', popolaRegioni);
document.getElementById('regione').addEventListener('change', popolaProvince);
if (document.getElementById('visibility') !== null) {
  document.getElementById('visibility').addEventListener('change', popolaAreaGeo);
}
if (document.getElementById('cercaProv') !== null) {
  document.getElementById('cercaProv').addEventListener('click', cercaRegProv);
}