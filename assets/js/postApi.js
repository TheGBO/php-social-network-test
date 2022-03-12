function submitPost(){
    let formElement = document.getElementById('post-form');
    let pfcon = document.getElementById('pf__content');
    const data = new URLSearchParams();
    for(const pair of new FormData(formElement)){
        data.append(pair[0], pair[1]);
        console.log(pair);
    }
    fetch('createPost.php', {
        method:'post',
        body:data
    }).then((val) => val.text()).then((body) => {
        let data = JSON.parse(body);
        console.log(data);
        pfcon.value = "";
        getPosts();
    });
    console.log(data);
}

function getPosts(){
    console.log("fetching posts");
    fetch('feedApi.php', {
        method:'get'
    }).then(val => val.text()).then((body) => {
        let data = JSON.parse(body)
        let fpc = document.getElementById('feed-posts-container');
        fpc.innerHTML = "";
        data.map((post) => {
            fpc.innerHTML += 
            `
            <div class="post">
                <img src="${post.profile_picture}" class="profile-pfp">
                <h3 class="post-profile-name">${post.username}</h3>
                <p class="post-content">${post.content}</p>
            </div>
            `;
        })
    })
}