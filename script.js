
var videoMaxLengthInSeconds = 120;

// Inialize the video player
var player = videojs("myVideo", {
    controls: true,
    width: 720,
    height: 480,
    fluid: false,
    plugins: {
        record: {
            audio: true,
            video: true,
            maxLength: videoMaxLengthInSeconds,
            debug: true,
            videoMimeType: "video/webm;codecs=H264"
        }
    }
}, function(){
    // print version information at startup
    videojs.log(
        'Using video.js', videojs.VERSION,
        'with videojs-record', videojs.getPluginVersion('record'),
        'and recordrtc', RecordRTC.version
    );
});

// error handling for getUserMedia
player.on('deviceError', function() {
    console.log('device error:', player.deviceErrorCode);
});

// Handle error events of the video player
player.on('error', function(error) {
    console.log('error:', error);
});

// user clicked the record button and started recording !
player.on('startRecord', function() {
    console.log('started recording! Do whatever you need to');
});

// user completed recording and stream is available
player.on('finishRecord', function() {
// the blob object contains the recorded data that
// can be downloaded by the user, stored on server etc.
console.log('finished recording: ', player.recordedData);

// Create an instance of FormData and append the video parameter that
// will be interpreted in the server as a file
var formData = new FormData();
formData.append('video', player.recordedData.video);

// Execute the ajax request, in this case we have a very simple PHP script
// that accepts and save the uploaded "video" file
xhr('./upload-video.php', formData, function (fName) {
console.log("Video succesfully uploaded !");
});

// Helper function to send 
function xhr(url, data, callback) {
var request = new XMLHttpRequest();
request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
        callback(location.href + request.responseText);
    }
};
request.open('POST', url);
request.send(data);
}
});
