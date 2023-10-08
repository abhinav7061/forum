let url = "https://kontests.net/api/v1/all"
let response = fetch(url)
response.then((v) => {
        console.log(v)
        return v.json();
}).then((contests) => {
        console.log(contests)
        ihtml = ""
        for (item in contests) {
                let img_url="";
                if(contests[item].site.toLowerCase()=="atcoder"){
                        img_url="https://asset.brandfetch.io/idZMTV6iO2/id7eN4m9ln.png";
                }
                else if(contests[item].site.toLowerCase()=="codeforces"){
                        img_url="https://asset.brandfetch.io/idMR4CMjcL/idPWmM8aOc.png";
                }
                else{
                        img_url = "https://logo.uplead.com/"+contests[item].site.toLowerCase()+".com";
                }
                // img_url = contests[item].site.toLowerCase()+".com";
                console.log(contests[item])
                // <img src="https://cdn-media-1.freecodecamp.org/images/1*JMsN-rnyB1H2q14RbQsVBw.jpeg" class="card-img-top" alt="...">
                ihtml += `
                <div class="contest-card m-3 p-4">
                                <img src="${img_url}" alt="${contests[item].site} ${img_url} logo"  class=contest-img img-fluid"/>
                                <div class="card-body">  
                                        <h5 class="text-white my-2">${contests[item].name}</h5>
                                        <p class="card-text"> Status is ${contests[item].status} and site is ${contests[item].site} In 24 Hours? </p>
                                        <p class="text-white">Starts at: ${contests[item].start_time}
                                        <p class="text-white">Starts at: ${contests[item].end_time}<br/>
                                        <a href="${contests[item].url}" class="btn btn-primary my-4">Visit Contest</a>
                                </div>
                        </div>
                `
        }
        cardContainer.innerHTML = ihtml
})
