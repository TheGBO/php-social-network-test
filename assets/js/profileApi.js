function getParameterByName(name) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}

var global_profile_data;
var followersDisplay = document.getElementById('follower-count');
var actionDisplay = document.getElementById('follow-action');

function getProfileInfo(){
    fetch(`api.profile.php?id=${getParameterByName('id')}`, {
        method:'get'
    }).then((val) => val.text()).then((body) => {
        let data = JSON.parse(body);
        let profinfo = document.getElementById('profile-info');
        profinfo.innerHTML = /*html*/ 
        `
        <img src="${data.profile_picture}" class="profile-pfp">
        <h1>${data.username}</h1>
        `

        let followBtn = document.getElementById('follow-btn');
        if(data.owned_by_me){
            followBtn.remove();
        }

        
        followersDisplay.innerText = data.follower_count;

        global_profile_data = data;
        console.log(data);
        if(global_profile_data.followed_by_me){
            actionDisplay.innerText = "Unfollow";
        }else{
            actionDisplay.innerText = "Follow";
        }
    })
}

function followProfile(){
    let action;
    if(global_profile_data.followed_by_me){
        action = "unfollow";
    }else{
        action = "follow";
    }
    fetch(`api.profile.php?id=${getParameterByName('id')}&${action}`,{
        method:'get',
    }).then((val) => val.text()).then((body) => {
        getProfileInfo();
    })
}