const ListCharacters = async () => {

    const response = await fetch("http://localhost/php-native-api-rest/api-rest/character/getcharacters/");
    const characters = await response.json();

    let tableBody = '';

    if(characters.status === true)
    {
        characters.data.forEach(function (character) {
            tableBody += `<tr>
            <th scope="row" class='centered'>${character.id}</th>
            <td>${character.name_character}</td>
            <td>${character.description}</td>
            <td><a class="btn btn-primary" href="http://localhost/php-native-api-rest/form-character.php?number=${character.id}/">Edit</a></td>
            <td><button class="btn btn-danger" onclick="DeleteCharacter(${character.id})">Delete</button></td>
            </tr>`;        
        });
        
        document.querySelector("#tablebody_character").innerHTML = tableBody;
    } else {
        alert('Error in the call');
    }
};

window.addEventListener("load", function () {
    ListCharacters();
});

function DeleteCharacter(value)
{
    if (window.confirm("Do you really delete this character?")) 
    {    
        try {
            const response = fetch("http://localhost/php-native-api-rest/api-rest/character/deletecharacter/" + value, {
                    method: "DELETE",
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });
                
                if(response)
                {
                    alert("Deleting");
                }
    
        } catch (e) {
            console.error(e);
        }

        window.location.href = "http://localhost/php-native-api-rest/";
    }
}
