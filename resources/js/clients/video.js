$(document).ready(function() {
    window.onbeforeunload = function() {
        return 'Confirm reload';
    }

    var accessToken = $('#access-token').val();
    var roomName = $('#room-name').val();

    Twilio.Video.createLocalTracks({
        audio: true,
        video: { width: 400 }
    }).then(function(localTracks) {
       return Twilio.Video.connect(accessToken, {
           name: roomName,
           tracks: localTracks,
           video: { width: 300 }
       });
    }).then(function(room) {

       room.participants.forEach(participantConnected);

       var previewContainer = document.getElementById(room.localParticipant.sid);
       if (!previewContainer || !previewContainer.querySelector('video')) {
           participantConnected(room.localParticipant);
       }

       room.on('participantConnected', function(participant) {
           console.log("Joining: '" +   participant.identity+   "'");
           participantConnected(participant);
       });

       room.on('participantDisconnected', function(participant) {
           console.log("Disconnected: '"   +participant.identity+   "'");
           participantDisconnected(participant);
       });

    });
    // additional functions will be added after this point
    function participantConnected(participant) {

       const div = document.createElement('div');

       div.id = participant.sid;

       div.setAttribute("style", "float: left; width: 100%;");

       participant.tracks.forEach(function(track) {
           trackAdded(div, track)
       });

       participant.on('trackAdded', function(track) {
           trackAdded(div, track)
       });
       participant.on('trackRemoved', trackRemoved);

       if ( parseInt( participant.identity) == parseInt($('#user-id').val())) {
            $('#media-div').find('.my-media').append(div);
            $(`<span class="user-name-video">`+ $('#user-name').val() +`</span>`).prependTo(div);
            $('.box-chat-room').css({
                'background': '#afaf93',
                'padding': '20px',
                'position': 'relative'
            });
       } else {
            $('#media-div').find('.other-media').append(div)
       }
    }

    function participantDisconnected(participant) {
       participant.tracks.forEach(trackRemoved);
       document.getElementById(participant.sid).remove();
    }

    function trackAdded(div, track) {
       div.appendChild(track.attach());
       var video = div.getElementsByTagName("video")[0];
       if (video) {
           video.setAttribute("style", "width:100%;");
       }
    }

    function trackRemoved(track) {
       track.detach().forEach( function(element) { element.remove() });
    }

});
