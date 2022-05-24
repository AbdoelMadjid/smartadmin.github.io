<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="<?= base_url("assets/template/dist/css") ?>/dashboard.css">
</head>

<body oncontextmenu="openFullscreen()" onclick="openFullscreen()" onkeydown="openFullscreen()">
  <!-- <body onload="window.open('fullScreenPage.html, '', 'fullscreen=yes, scrollbars=auto');"></body> -->

  <div style="text-align:center" class="video-container">
    <!--<button onclick="playPause()">Play/Pause</button> 
   <button onclick="makeBig()">Big</button>
  <button onclick="makeSmall()">Small</button>
  <button onclick="makeNormal()">Normal</button> -->
    <!-- <br><br> -->
    <!-- <video id="video1" width="420" muted playsinline loop controls>
      <source src="<?= base_url('assets/videos/') ?>bear.webm" type="video/webm">
      <source src="<?= base_url('assets/videos/') ?>bear.ogg" type="video/ogg">
      <source src="<?= base_url('assets/videos/') ?>bear.mp4" type="video/mp4">
      Your browser does not support HTML video.
    </video> -->
    <?php
    $queryVideo = "SELECT title, path FROM list_video limit 1";
    $getVideo = $this->db->query($queryVideo)->result_array();
    ?>

    <?php $locPath = 'assets/upload/video/'; ?>

    <?php foreach ($getVideo as $listVideo) : ?>
      <?php $myPath = str_replace(FCPATH, '', $locPath . $listVideo['title']); ?>

      <?php if ($myPath) : ?>
        <video id="video1" width="420" muted playsinline loop controls>
          <source src=" <?= base_url($myPath); ?>" type="video/mp4">
          Your browser does not support HTML video.
        </video>
      <?php else : ?>
        <h1>no video</h1>
      <?php endif; ?>
    <?php endforeach; ?>

    <p id="writeHere"></p>
    <button onclick="openFullscreen();" class="mb-3 btnFullScreen">Open Video in Fullscreen Mode</button>
    <br>
  </div>

  <script>
    var myVideo = document.getElementById("video1");
    setTimeout(playPause, 2000);

    function openFullscreen() {
      if (myVideo.requestFullscreen) {
        myVideo.requestFullscreen().apply(myVideo);
      } else if (myVideo.webkitRequestFullscreen) {
        /* Safari */
        myVideo.webkitRequestFullscreen().apply(myVideo);
      } else if (myVideo.msRequestFullscreen) {
        /* IE11 */
        myVideo.msRequestFullscreen().apply(myVideo);
      }
    }

    function makeBig() {
      // myVideo.width = 100vw; 
      // myVideo.width = 100vh; 
      // if( (screen.availHeight || screen.height-30) <= window.innerHeight) {
      // browser is almost certainly fullscreen      
      // document.getElementById("writeHere").innerHTML = "this almost fullscreen"+screen.availHeight;
      // }else{
      //   document.getElementById("writeHere").innerHTML = "not fullscreen: "+screen.availHeight;      
      // }
    }

    function playPause() {
      if (myVideo.paused)
        myVideo.play()
      else
        myVideo.pause();
    }

    // $(document).ready(function(){
    //   setTimeout(function(){
    //     myVideo.muted=false    
    //   }, 7000)
    // })
  </script>

</body>

</html>