let Roster = [];



let rosterDiv

let scratchedDiv



// Mobile touch handlers

let activeDraggedElement = null;

let originalDropzone = null;

let originalPosition = { left: 0, top: 0 };

let lastHoveredElement = null;





function setup() 

{

    rosterDiv = document.getElementById('Roster')

    scratchedDiv = document.getElementById('Scratched')



   createPlayers();



    // Handle drop zones in Lines (roster-containers)

    let dropZones = document.querySelectorAll('#Lines .roster-container');

    dropZones.forEach(zone => {

        zone.addEventListener('dragover', allowDrop);

        zone.addEventListener('drop', handleDropOnContainer);

        zone.addEventListener('touchend', handleTouchEnd);

    });



    // Make the roster droppable

    let rosterDropZone = document.getElementById('Roster');

    rosterDropZone.addEventListener('dragover', allowDrop);

    rosterDropZone.addEventListener('drop', handleDropToRoster);

    //rosterDropZone.addEventListener('touchmove', handleTouchMove);

    rosterDropZone.addEventListener('touchend', handleTouchEnd);



    // Make the scratched list droppable

    let scratchedDropZone = document.getElementById('Scratched');

    scratchedDropZone.addEventListener('dragover', allowDrop);

    scratchedDropZone.addEventListener('drop', handleDropToScratched);

    //scratchedDropZone.addEventListener('touchmove', handleTouchMove);

    scratchedDropZone.addEventListener('touchend', handleTouchEnd);



    // Save button functionality

    let saveButton = createButton('Save');

    saveButton.parent('saveBtn');

    saveButton.mousePressed(savePositions);

}



function createPlayers() {

     // Create player divs using the players array (array of objects) from PHP

    // console.log('creating players', players)

     players.forEach(player => {

        let name = player.Name;

        let pos = player.position;



        let destDiv 



         // Split players into categories based on Status1

       

        switch (player.Status1) {

            case 0:    //  farmScratched

                destDiv = null

                break;

            case 1:  // farmDressed

                destDiv = null

                break;

            case 2:    // proSratched

                destDiv = scratchedDiv;

                break;

            case 3:    // proDressed

                destDiv = rosterDiv;

                break;

        

            default:

                break;

        }

       

        if(destDiv) {

            let d = createDraggablePlayerDiv(name,destDiv)

            let p = { name: name, pos: pos, div: d, lineup: "", status: destDiv.id }

            console.log(p)

            Roster.push(p);

        }

            

    });

}



function createDraggablePlayerDiv(playerName, parentDiv) 

{

    let contenant = createDiv().addClass('card Roster rosterElm draggable p-0').elt;

    contenant.id = playerName;

    contenant.setAttribute('draggable', true); 

    let bodyDiv = createDiv().parent(contenant).addClass('card-body p-0').elt;

    createP(playerName).parent(bodyDiv).addClass('card-text');

    parentDiv.appendChild(contenant)



    makeDraggable(contenant, parentDiv.id )



    return contenant;

}



function makeDraggable(div, fromZone, isDZ = false) {

    // Add dragstart event listener

    div.addEventListener('dragstart', function (event) { 

        //console.log('Dragging started for:', div.id);

        event.dataTransfer.setData('playerId', div.id);

        event.dataTransfer.setData('fromZone', fromZone);

    });



    // Ensure touch events are re-enabled after handling

    div.addEventListener('touchstart', handleTouchStart);

    div.addEventListener('touchmove', handleTouchMove);

    // Optionally: Add touchend event again if needed (depends on your logic flow)

    if(isDZ) div.addEventListener('touchend', handleTouchEnd);

}









function allowDrop(event) {

    event.preventDefault();

    /*  TODO:   implement effect to show possible drop here   */   

}



function handleDropOnContainer(event) {

    event.preventDefault()

  

    let target = event.currentTarget;

    let playerName = event.dataTransfer.getData('playerId')

    let playerDiv = document.getElementById(playerName)

    let fromZone = event.dataTransfer.getData('fromZone')



    dropOnContainer(target, playerDiv, fromZone)

}



function handleDropToRoster(event) {

    event.preventDefault();

    let playerName = event.dataTransfer.getData('playerId')

    let fromZone = event.dataTransfer.getData('fromZone')

    let playerDiv = document.getElementById(playerName)

    dropToRoster(playerDiv, fromZone)

}



function handleDropToScratched(event) {

    event.preventDefault();

    let playerName = event.dataTransfer.getData('playerId')

    let fromZone = event.dataTransfer.getData('fromZone')

    let playerDiv = document.getElementById(playerName)

    dropToScratched(playerDiv, fromZone)

}





function dropOnContainer(targetDiv, playerDiv, fromZone) {



    let parentDiv = playerDiv.parentElement           // origin div

    let currentDiv 

    let currentPlayerInZone

    if(targetDiv.querySelector('.card-body')) 

    {

        currentPlayerInZone = targetDiv.querySelector('.card-text').innerHTML  // get player Name if assigned

        currentDiv = document.getElementById(currentPlayerInZone)    // current player div in place if exist, or lineup container div    

       

    } else {

        currentPlayerInZone = targetDiv.innerHTML  // or get lineup Pos

        currentDiv = targetDiv

    }

  

    console.log("Dropping:", playerDiv.id, "on:", targetDiv.id, "CurrentInZone:", currentDiv.id , "From", fromZone)

     

    if (fromZone === 'roster-container') 

    {

        if(targetDiv.id === currentDiv.id) {             // Empty lineup

            targetDiv.innerHTML = ''

            targetDiv.appendChild(playerDiv)

            console.log(parentDiv)

            //parentDiv.innerHTML = "<div class=\"card-body \"><p class=\"card-text\">" +  parentDiv.id + "</p></div>"

            parentDiv.innerHTML =  parentDiv.dataset.linePos;

        } else {                                        //  a player was already assigned.

            targetDiv.innerHTML = ''

            targetDiv.appendChild(playerDiv)

            parentDiv.innerHTML =  parentDiv.dataset.linePos;

            rosterDiv.appendChild(currentDiv)

        }  

    } 

    else {

        targetDiv.innerHTML = "";

        targetDiv.appendChild(playerDiv)

        //  if a player was previously assigned

        if(currentDiv.id  !== targetDiv.id) {   

            console.log("Returning previous player to roster:" , currentDiv)

            rosterDiv.appendChild(currentDiv)     }                       

    }



    makeDraggable(playerDiv, 'roster-container', true)

}



function dropToScratched(playerDiv, fromZone) {

      

    console.log("Dropping:", playerDiv.id, "on:", "Scratched", "From:", fromZone)

    if (fromZone === 'Scratched') return



    if (fromZone === 'roster-container') {

        let parentDiv = playerDiv.parentElement;

        parentDiv.innerHTML =  parentDiv.dataset.linePos;

    }



    scratchedDiv.appendChild(playerDiv)



  //  makeDraggable(playerDiv, 'Scratched')

}



function dropToRoster(playerDiv, fromZone) {



    if (fromZone === 'Roster') return



    if (fromZone === 'roster-container') {

        let parentDiv = playerDiv.parentElement;

        parentDiv.innerHTML =  parentDiv.dataset.linePos;

    }



    rosterDiv.appendChild(playerDiv);

    playerDiv.addEventListener('dragstart', function (event) {

        event.dataTransfer.setData('playerId', playerDiv.id);

        event.dataTransfer.setData('fromZone', 'Roster');

    });

}







function handleTouchEndOnContainer(data) { 

    console.log('Touch drop to lineup', data.dragged.id, data.fromZone, "target:", data.currentTarget.id)

    dropOnContainer(data.currentTarget, data.dragged, data.fromZone)

}



function handleTouchEndBackToRoster(data) {

    console.log('Touch drop to roster', data.dragged.id, data.fromZone)

    dropToRoster(data.dragged, data.fromZone)

}



function handleTouchEndToScratched(data) {

    console.log('Touch drop to Scratched', data.dragged.id, data.fromZone)

    dropToScratched(data.dragged, data.fromZone)

}







function handleTouchStart(event) {

    event.preventDefault();

    let touch = event.touches[0];



    activeDraggedElement = event.currentTarget; // Get the element being dragged

    originalDropzone = getDropzone(activeDraggedElement.parentElement); // Store the original dropzone based on parent   //originalDropzone = getDropzone(activeDraggedElement); // Store the original dropzone

    activeDraggedElement.fromZone = originalDropzone

    

    activeDraggedElement.style.opacity = '0.4'; // Visual feedback

    //activeDraggedElement.style.position = 'absolute'; // Set position to absolute for drag movements

    //activeDraggedElement.style.position = 'fixed'; // Set position to fixed for drag movements

  //  style=" overflow-x: hidden;"  on main container fixes issue of div being out of page when drag start....

    

   



    console.log("TouchStart:", activeDraggedElement, "from ", originalDropzone )

  



    // Store original position in case we need to revert it

    const rect = activeDraggedElement.getBoundingClientRect();

    originalPosition.left = rect.left;

    originalPosition.top = rect.top;



    // Correct the offset

    activeDraggedElement.touchStartX = touch.pageX - rect.left;

    activeDraggedElement.touchStartY = touch.pageY - rect.top;

}



function handleTouchMove(event) {

    event.preventDefault();

    let touch = event.touches[0];



   // console.log("Move:", activeDraggedElement)

    if (activeDraggedElement) {

        // Update the element's position during dragging

        activeDraggedElement.style.left = `${touch.pageX  - activeDraggedElement.touchStartX}px`;

        activeDraggedElement.style.top = `${touch.pageY  - activeDraggedElement.touchStartY}px`;

    }



    let element = document.elementFromPoint(touch.pageX, touch.pageY);

    let dropzone = findClosestDropzone(element);  // Use the new function



   // console.log(" over :", element)

    // Reset border of the previously hovered element if it's not the current one

    if (lastHoveredElement && lastHoveredElement !== dropzone) {

        lastHoveredElement.style.border = ""; // Reset border to original

    }



    // Highlight the current hovered element if it's a valid dropzone

    if (getDropzone(element)) {

        element.style.border = "2px solid green";

        lastHoveredElement = dropzone; // Update the last hovered element

    }

}



function handleTouchEnd(event) {

    event.preventDefault();



    if (activeDraggedElement) {

        let touch = event.changedTouches[0];

        let element = document.elementFromPoint(touch.clientX, touch.clientY);



        let destination = findClosestDropzone(element);  // Find the closest valid dropzone 

        let dz = getDropzone(destination)



        if (destination) {                                // If a valid dropzone is found

            if (dz === 'Roster') {

                handleTouchEndBackToRoster({

                    dragged: activeDraggedElement,

                    currentTarget: element,

                    fromZone: originalDropzone

                });

            } else if (dz === 'roster-container') {

                handleTouchEndOnContainer({

                    dragged: activeDraggedElement,

                    currentTarget: element,

                    fromZone: originalDropzone

                });

            } else if (dz === 'Scratched') {

                handleTouchEndToScratched({

                    dragged: activeDraggedElement,

                    currentTarget: element,

                    fromZone: originalDropzone

                });

            }

        } else {

            // If no valid dropzone is found, revert the element to its original position

            activeDraggedElement.style.left = `${originalPosition.left}px`;

            activeDraggedElement.style.top = `${originalPosition.top}px`;

        }



        console.log("Touch End:", activeDraggedElement.id, "from", originalDropzone, "to", dz);



        // Reset the dragged element state

        activeDraggedElement.style.opacity = '1';

        activeDraggedElement.style.position = 'static'; // Reset position style

        activeDraggedElement = null;

        originalDropzone = null; // Clear the stored dropzone

    }

}



// Function to get the dropzone of an element

function getDropzone(element) {

    let dz = null

    if(element.classList.contains('Roster'))           dz = "Roster"

    if(element.classList.contains('roster-container')) dz = "roster-container"

    if(element.classList.contains('Scratched'))        dz = "Scratched"



    return dz;

}

// Function to traverse the DOM tree and find the closest valid dropzone

function findClosestDropzone(element) {

    while (element && !getDropzone(element)) {

        element = element.parentElement;

    }

    return element; // Return the closest dropzone or null if not found

}







function savePositions() {

    console.log(Roster);

}





function draw() {

    /* for p5.js compatibility */

}











// Pass the PHP array to a JavaScript variable

let playersNames = ['Player1', 'Player2', 'Player3', 'Player4'];

let playersPositions =  ['LW', 'C', 'RW', 'DD'];

let playersStatus = ['H', 'H', 'H', 'S'];

let players = [];



for (let i = 0; i < playersNames.length; i++) {

    let name = playersNames[i];

    let position = playersPositions[i];

    let status = playersStatus[i];

    players.push({ name: name, position: position, status: status});

}



console.log(players); // Check the structure of the players array





document.addEventListener('DOMContentLoaded', function() {

// Check if teamID is set

if (typeof teamID !== 'undefined' && teamID > 0) {

    // Fetch player info from API

   // fetch(`http://192.168.1.161:8001/API.php?PlayerInfo&Team=${teamID}`)

    fetch(`/API.php?PlayerInfo&Team=${teamID}`)

        .then(response => {

            console.log('Raw response:', response);

            if (!response.ok) {

                throw new Error('Network response was not ok');

            }

            return response.json();

        })

        .then(data => {

            // Process and display player data

            //displayPlayers(data);

            players = data;

            console.log(players)

            createPlayers()

        })

        .catch(error => {

            console.error('There has been a problem with your fetch operation:', error);

        });

} else {

    console.log('Team ID is not set or invalid.');

}

});



function displayPlayers(playersArray) {

const playerCategories = {

    farmScratched: [],

    farmDressed: [],

    proScratched: [],

    proDressed: [],

    // Add more categories as needed

};



// Split players into categories based on Status1

playersArray.forEach(player => {

    switch (player.Status1) {

        case 0:   

            playerCategories.farmScratched.push(player);

            break;

        case 1:  

            playerCategories.farmDressed.push(player);

            break;

        case 2:   

            playerCategories.proScratched.push(player);

            break;

        case 3:    

            playerCategories.proDressed.push(player);

            break;

        // Add more cases as needed

        default:

            // Handle other statuses or ignore

            break;

    }

});



// Display the categorized players

displayCategorizedPlayers(playerCategories);

}



function displayCategorizedPlayers(categories) {

const playerListContainer = document.getElementById('player-list');

playerListContainer.innerHTML = ''; // Clear previous content



for (const [status, players] of Object.entries(categories)) {

    if (players.length > 0) {

        const categoryDiv = document.createElement('div');

        categoryDiv.className = 'player-category';

        categoryDiv.innerHTML = `<h2>Status ${status}</h2>`;

        

        players.forEach(player => {

            const playerItem = document.createElement('div');

            playerItem.className = 'player-item';

            playerItem.innerHTML = `

                <h3>${player.Name} (${player.Number})</h3>

                <p>Team: ${player.TeamName}</p>

                <p>Age: ${player.Age}</p>

                <p>Position: ${player.PosD ? 'Defenseman' : 'Unknown'}</p>

                <a href="${player.URLLink}" target="_blank">View Profile</a>

            `;

            categoryDiv.appendChild(playerItem);

        });



        playerListContainer.appendChild(categoryDiv);

    }

}

}







 /* 

    document.addEventListener('DOMContentLoaded', function() {

    

    if (typeof teamID === 'undefined' || teamID === null || teamID === 0) {

        // teamID is either undefined or null

        console.log("teamID no set yet")

    } else {

        const url = new URL(window.location.href);

        if (!url.searchParams.has('Team')) {

            url.searchParams.set('Team', teamID);

            window.location.href = url.toString(); // Reload with new parameter

        } 

    } 

});

*/



