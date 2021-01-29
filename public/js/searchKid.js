function searchfor(event){
    if(event.key === "Enter"){
        event.preventDefault();
        const data = {search:this.value};
        fetch("/searchKid",{
            method: "POST",
            headers:{
                'Content-Type':'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function (kids){
            usersContainer.innerHTML = "";
            loadKid(kids)
        });

    }
}