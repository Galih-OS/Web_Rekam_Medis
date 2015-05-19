<script type="text/javascript">
/* Source Code by Herman Sulaeman - Sule Soft */
var txt=" SULE-SOFT.COM .:: Sarana untuk memperdalam Ilmu Teknologi Informasi ::.";
var speed=200;     //Pengaturan kecepatan semakin kecil nilai variable semakin cepat kecepatannya
var SULE_SS=null;
function move() { document.title=txt;
txt=txt.substring(1,txt.length)+txt.charAt(0);
fresh=setTimeout("move()",speed);}move();
</script>