function search(){
    let searchQuery = document.getElementById("search-input").value;
    fetch(`api.discover.php?q=${searchQuery}`,{
        method:'get'
    }   
    ).then(val => val.text()).then((body) => {
        let data = JSON.parse(body);
        console.log(data);
        let searchResults = document.getElementById('search-results');
        searchResults.innerHTML = "";
        if(!data.users){
            searchResults.innerHTML += "no results found";
            return
        }
        data.users.map((user) => {
            console.log(user);
            searchResults.innerHTML += /*html*/
            `
            <a href="profile.php?id=${user.id}">
                <div class="profile-result">
                    <img src="${user.profile_picture}" class="profile-pfp">
                    <h1>${user.username}</h1>
                </div>
            </a>
            `
        });
    })
}