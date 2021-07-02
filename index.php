<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Audio/Video Example - Record Plugin for Video.js</title>
        
        <!-- Include Video.js stylesheet (https://videojs.com/) -->
        <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
        <link href="../node_modules/video.js/dist/video-js.min.css" rel="stylesheet">

        <!-- Style of VideoJS -->
        <link href="../dist/css/videojs.record.css" rel="stylesheet">


        

        <style>
        /* change player background color */
        #myVideo {
            background-color: #9ab87a;
        }
        </style>
    </head>
    <body>
        <!-- Create the preview video element -->
        <video id="myVideo" class="video-js vjs-default-skin"></video>

        <!-- 1. Include action buttons play/stop -->
<button id="btn-start-recording">Start Recording</button>
<button id="btn-stop-recording" disabled="disabled">Stop Recording</button>

<!--
    2. Include a video element that will display the current video stream
    and as well to show the recorded video at the end.
 -->
<hr>
<video id="my-preview" controls autoplay></video>

<!-- 3. Include the RecordRTC library and the latest adapter -->
<script src="https://cdn.webrtc-experiment.com/RecordRTC.js"></script>
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
        
        <!-- Load video.js -->
        <script src="../node_modules/video.js/dist/video.min.js"></script>

        <!-- Load RecordRTC core and adapter -->
        <script src="../node_modules/recordrtc/RecordRTC.js"></script>
        <script src="../node_modules/webrtc-adapter/out/adapter.js"></script>
        
        <!-- Load VideoJS Record Extension -->
        <script src="../dist/videojs.record.js"></script>
   
         <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
         <script src="script.js"></script>
    </body>
</html>
