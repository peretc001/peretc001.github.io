var vid = "DLyhGVorOp0",
    streams,
    video_focused = true,
    video_tag = $("#video"),
    video_obj = video_tag.get(0);
$.get("https://images"+~~(Math.random()*33)+"-focus-opensocial.googleusercontent.com/gadgets/proxy?container=none&url=https%3A%2F%2Fwww.youtube.com%2Fget_video_info%3Fvideo_id%3D" + vid, function(data) {
//console.log(data);
    if (data) {
        streams = parse_youtube_meta(data);
        video_tag.attr({
            src: streams['1080p'] || streams['720p'] || streams['360p']
        });

        document.addEventListener("visibilitychange", function() {
            video_focused = !video_focused ? video_obj.play() : video_obj.pause();
        });
    } else {
    		$('pre').text('Youtube API Error');
    }
});

function parse_youtube_meta(rawdata) {
    var data = parse_str(rawdata),
        streams = (data.url_encoded_fmt_stream_map + ',' + data.adaptive_fmts).split(','),
        result = {};
    streams.forEach(function(s) {
        var stream = parse_str(s),
            itag = stream.itag * 1,
            quality = false,
            itag_map = {
                18: '360p',
                22: '720p',
                37: '1080p',
                38: '3072p',
                82: '360p3d',
                83: '480p3d',
                84: '720p3d',
                85: '1080p3d',
                133: '240pna',
                134: '360pna',
                135: '480pna',
                136: '720pna',
                137: '1080pna',
                264: '1440pna',
                298: '720p60',
                299: '1080p60na',
                160: '144pna',
                139: "48kbps",
                140: "128kbps",
                141: "256kbps"
            };
        //if (stream.type.indexOf('o/mp4') > 0) console.log(stream);
        if (itag_map[itag]) result[itag_map[itag]] = stream.url;
    });
    return result;
};

function parse_str(str) {
    return str.split('&').reduce(function(params, param) {
        var paramSplit = param.split('=').map(function(value) {
            return decodeURIComponent(value.replace('+', ' '));
        });
        params[paramSplit[0]] = paramSplit[1];
        return params;
    }, {});
}

//Phone mask
[].forEach.call( document.querySelectorAll('.tel'), function(input) {
      var keyCode;
      function mask(event) {
          event.keyCode && (keyCode = event.keyCode);
          var pos = this.selectionStart;
          if (pos < 3) event.preventDefault();
          var matrix = "+7 (___) ___ ____",
              i = 0,
              def = matrix.replace(/\D/g, ""),
              val = this.value.replace(/\D/g, ""),
              new_value = matrix.replace(/[_\d]/g, function(a) {
                  return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
              });
          i = new_value.indexOf("_");
          if (i != -1) {
              i < 5 && (i = 3);
              new_value = new_value.slice(0, i);
          }
          var reg = matrix.substr(0, this.value.length).replace(/_+/g,
              function(a) {
                  return "\\d{1," + a.length + "}"
              }).replace(/[+()]/g, "\\$&");
          reg = new RegExp("^" + reg + "$");
          if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
          if (event.type == "blur" && this.value.length < 5)  this.value = "";
      }
  
      input.addEventListener("input", mask, false);
      input.addEventListener("focus", mask, false);
      input.addEventListener("blur", mask, false);
      input.addEventListener("keydown", mask, false);
  });