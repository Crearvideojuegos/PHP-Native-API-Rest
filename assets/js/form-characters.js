const viewCharacter = async () => {

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    let number = urlParams.get('number');

    if(number !== null) { 

        const response = await fetch("http://localhost/php-native-api-rest/api-rest/character/getcharacterbyid/" + number);
        const characters = await response.json();
    
        if(characters.status === true)
        {
            characters.data.forEach(function (character) {
    
                document.querySelector("#name_character").setAttribute('value', character.name_character);
                document.querySelector("#description").setAttribute('value', character.description);
            });
        }
    }
};

window.addEventListener("load", function () {
    viewCharacter();
});

async function sendData() {

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    let number = urlParams.get('number');

    const form = document.querySelector('form');
    const formData = new FormData(form);

    let info = new Object();
    info.name_character = formData.get('name_character');
    info.description = formData.get('description');

    let jsonString = JSON.stringify(info);

    //INSERT
    if(number === null) { 
        try {
            const response = await fetch("http://localhost/php-native-api-rest/api-rest/character/insertcharacter/", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                    body: jsonString,
                });
        } catch (e) {
            console.error(e);
        }
    //UPDATE
    } else {
        try {
            const response = await fetch("http://localhost/php-native-api-rest/api-rest/character/updatecharacter/" + number, {
                method: "PUT",
                headers: {
                    'Content-Type': 'application/json'
                },
                    body: jsonString,
                });
        } catch (e) {
            console.error(e);
        }
    }

    window.location.href = "http://localhost/php-native-api-rest/";

}

const send = document.querySelector("#send");
send.addEventListener("click", sendData);


