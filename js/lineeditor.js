function valChange(field, type, sid, updown, BlockPlayerFromPlayingLines12, BlockPlayerFromPlayingLines123, BlockPlayerFromPlayingLines12inPPPK,
    ProForceGameStrategiesTo, ProForceGameStrategiesAt5, FarmForceGameStrategiesTo, FarmForceGameStrategiesAt5,
    PullGoalerMinGoal, PullGoalerMinGoalEnforce, PullGoalerMinPct, PullGoalerRemoveGoaliesSecond, PullGoalerMax) {

var fieldvalue = parseInt(document.getElementById(field).value);
var curvalue = (updown == 'up') ? fieldvalue + 1 : fieldvalue - 1;
var curtotal = 0;
var maxmin = 0;
var val = 0;
var vallast = 100000000;
var flag = false;
var typesplit = type.split("-");
var message = ''; // For console and banner logging

console.log('field:', field, 'type:', type, 'sid:', sid, updown, '*-*', BlockPlayerFromPlayingLines12);

if (type == 'Strat') {	
var fOF = document.getElementById(sid + 'OF').value;
var fDF = document.getElementById(sid + 'DF').value;
var fPhy = document.getElementById(sid + 'Phy').value;
curtotal = parseInt(fOF) + parseInt(fDF) + parseInt(fPhy); 
maxmin = (updown == 'up') ? 5 : 0;

if (!(updown == 'up' && curtotal < maxmin && fieldvalue < maxmin)) {
message = `Change refused: Total strategy value ${curtotal} does not meet the required max/min for field "${field}".`;
}
} else if (typesplit[0] == 'Int') {
switch(field) {
case 'Strategy1GoalDiff':
 maxmin = (updown == 'up') ? (typesplit[1] - 1) : parseInt(document.getElementById('Strategy2GoalDiff').value) + 1;
 break;
case 'Strategy2GoalDiff':
 maxmin = (updown == 'up') ? parseInt(document.getElementById('Strategy1GoalDiff').value) - 1 : 1;
 break;
case 'RemoveGoaliesSecond':
 maxmin = (updown == 'up') ? PullGoalerMax : 0;
 break;
case 'PullGoalerMinGoal':
 maxmin = (updown == 'up') ? 10 : PullGoalerMinGoalEnforce;
 break;
default:
 maxmin = (updown == 'up') ? (typesplit[1] - 1) : 1;
 break;
}

if (!(curvalue <= maxmin && !flag)) {
message = `Change refused: Current value ${curvalue} exceeds allowed max/min for "${field}".`;
}
} else {
if (sid == 'Line15vs5Forward' || sid == 'Line25vs5Forward' || sid == 'Line35vs5Forward' || sid == 'Line45vs5Forward') {
for (let x = 1; x <= 4; x++) {
 val = (sid == 'Line' + x + '5vs5Forward') ? curvalue : parseInt(document.getElementById('Line' + x + '5vs5ForwardTime').value);
 if (val > vallast || val == 100) {
     flag = true;
     message = `Change refused: Value sequence error for "${sid}".`;
     break;
 }
 curtotal += val;
 vallast = val;
}
}
maxmin = (updown == 'up') ? 100 : 1;
if (!(curtotal <= maxmin && !flag)) {
message = `Change refused: Total value ${curtotal} exceeds max/min limit for "${sid}".`;
}
}

// If there is a message, log it and update the HTML banner
if (message) {
console.log(message);
document.getElementById('errorBanner').innerText = message; // Update HTML banner
} else {
document.getElementById(field).value = curvalue; // If no issues, apply the new value
}

line_validator(BlockPlayerFromPlayingLines12, BlockPlayerFromPlayingLines123, BlockPlayerFromPlayingLines12inPPPK,
    ProForceGameStrategiesTo, ProForceGameStrategiesAt5, FarmForceGameStrategiesTo, FarmForceGameStrategiesAt5,
    PullGoalerMinGoal, PullGoalerMinGoalEnforce, PullGoalerMinPct, PullGoalerRemoveGoaliesSecond, PullGoalerMax);
}


function valChange(field,type,sid,updown,BlockPlayerFromPlayingLines12,BlockPlayerFromPlayingLines123,BlockPlayerFromPlayingLines12inPPPK,
						ProForceGameStrategiesTo,ProForceGameStrategiesAt5,FarmForceGameStrategiesTo,FarmForceGameStrategiesAt5,
						PullGoalerMinGoal,PullGoalerMinGoalEnforce,PullGoalerMinPct,PullGoalerRemoveGoaliesSecond,PullGoalerMax){

    
	var fieldvalue = parseInt(document.getElementById(field).value);
    
	var curvalue = (updown == 'up') ? fieldvalue + 1 : fieldvalue - 1;
	var curtotal = 0;
	var maxmin = 0;
	var last = 0;
	var val = 0;
	var vallast = 100000000;
	var flag = false;
	var typesplit = type.split("-");
    console.log('field ', field, 'type', type, 'sid', sid, updown, '*-*', BlockPlayerFromPlayingLines12 );
	if(type == 'Strat'){	
        
		var fOF = document.getElementById(sid + 'OF').value;
		var fDF = document.getElementById(sid + 'DF').value;
		var fPhy = document.getElementById(sid + 'Phy').value;
		curtotal = parseInt(fOF) + parseInt(fDF) + parseInt(fPhy); 
		maxmin = (updown == 'up') ? 5: 0;
		
		if(updown == 'up' && curtotal < maxmin && fieldvalue < maxmin){document.getElementById(field).value = curvalue;}
		if(updown == 'down' && curtotal > maxmin && fieldvalue > maxmin){document.getElementById(field).value = curvalue;}
	}else if(typesplit[0] == 'Int'){
		switch(field){
			case 'Strategy1GoalDiff':
				maxmin = (updown == 'up') ? (typesplit[1]-1) : parseInt(document.getElementById('Strategy2GoalDiff').value) + 1;
			break;
			case 'Strategy2GoalDiff':
				maxmin = (updown == 'up') ? parseInt(document.getElementById('Strategy1GoalDiff').value) - 1 : 1;
			break;
			case 'Strategy4GoalDiff':
				maxmin = (updown == 'up') ? parseInt(document.getElementById('Strategy5GoalDiff').value) - 1 : 1;
			break;
			case 'Strategy5GoalDiff':
				maxmin = (updown == 'up') ? (typesplit[1]-1) : parseInt(document.getElementById('Strategy4GoalDiff').value) + 1;
			break;
			case 'RemoveGoaliesSecond':
				maxmin = (updown == 'up') ? PullGoalerMax : 0;
			break;
			case 'PullGoalerMinGoal':
				maxmin = (updown == 'up') ? 10 : PullGoalerMinGoalEnforce;
			break;
			default:
				maxmin = (updown == 'up') ? (typesplit[1]-1): 1;
			break;
		}
		
		if(!flag && updown == 'up' && curvalue <= maxmin){document.getElementById(field).value = curvalue;}
		if(!flag && updown == 'down' && curvalue >= maxmin){document.getElementById(field).value = curvalue;}
	}else if(type == 'Time'){
		if(sid == 'Line15vs5Forward' || sid == 'Line25vs5Forward' || sid == 'Line35vs5Forward' || sid == 'Line45vs5Forward'){
			console.log('🎯 Forward Time - sid:', sid, 'field:', field, 'curvalue:', curvalue);
			for(x=1;x<=4;x++){
				var expectedSid = 'Line'+ x +'5vs5Forward';
				var timeFieldId = 'Line'+ x +'5vs5ForwardTime';
				var isCurrentField = (sid == expectedSid);
				val = isCurrentField ? curvalue : parseInt(document.getElementById(timeFieldId).value);
				console.log('  x=' + x + ', expectedSid=' + expectedSid + ', isCurrentField=' + isCurrentField + ', val=' + val);
				// Vérifier seulement si la valeur est valide (pas de contrainte d'ordre)
				if(val < 1 || val > 100){flag = true;break;}
				curtotal += val;
			}
		}else if(sid == 'Line15vs5Defense' || sid == 'Line25vs5Defense' || sid == 'Line35vs5Defense' || sid == 'Line45vs5Defense'){
			console.log('🎯 Defense Time - sid:', sid, 'field:', field, 'curvalue:', curvalue);
			for(x=1;x<=4;x++){
				val = (sid == 'Line'+ x +'5vs5Defense') ? curvalue : parseInt(document.getElementById('Line'+ x +'5vs5DefenseTime').value);
				console.log('  Defense x=' + x + ', val=' + val);
				// Vérifier seulement si la valeur est valide (pas de contrainte d'ordre)
				if(val < 1 || val > 100){flag = true;break;}
				curtotal += val;
			}
		}else if(sid == 'Line1PPForward' || sid == 'Line2PPForward'){
			for(x=1;x<=2;x++){
				val = (sid == 'Line'+ x +'PPForward') ? curvalue : parseInt(document.getElementById('Line'+ x +'PPForwardTime').value);
				if(val < 1 || val > 100){flag = true;break;}
				curtotal += val;
			}
		}else if(sid == 'Line1PPDefense' || sid == 'Line2PPDefense'){
			for(x=1;x<=2;x++){
				val = (sid == 'Line'+ x +'PPDefense') ? curvalue : parseInt(document.getElementById('Line'+ x +'PPDefenseTime').value);
				if(val < 1 || val > 100){flag = true;break;}
				curtotal += val;
			}
		}if(sid == 'Line14VS4Forward' || sid == 'Line24VS4Forward'){
			for(x=1;x<=2;x++){
				val = (sid == 'Line'+ x +'4VS4Forward') ? curvalue : parseInt(document.getElementById('Line'+ x +'4VS4ForwardTime').value);
				if(val > vallast || val == 100 ){flag = true;break;}
				curtotal += val;
				vallast = val;
			}
		}else if(sid == 'Line14VS4Defense' || sid == 'Line24VS4Defense'){
			for(x=1;x<=2;x++){
				val = (sid == 'Line'+ x +'4VS4Defense') ? curvalue : parseInt(document.getElementById('Line'+ x +'4VS4DefenseTime').value);
				if(val > vallast || val == 100 ){flag = true;break;}
				curtotal += val;
				vallast = val;
			}
		}else if(sid == 'Line1PK4Forward' || sid == 'Line2PK4Forward'){
			for(x=1;x<=2;x++){
				val = (sid == 'Line'+ x +'PK4Forward') ? curvalue : parseInt(document.getElementById('Line'+ x +'PK4ForwardTime').value);
				if(val > vallast || val == 100 ){flag = true;break;}
				curtotal += val;
				vallast = val;
			}
		}else if(sid == 'Line1PK4Defense' || sid == 'Line2PK4Defense'){
			for(x=1;x<=2;x++){
				val = (sid == 'Line'+ x +'PK4Defense') ? curvalue : parseInt(document.getElementById('Line'+ x +'PK4DefenseTime').value);
				if(val > vallast || val == 100 ){flag = true;break;}
				curtotal += val;
				vallast = val;
			}
		}else if(sid == 'Line1PK3Forward' || sid == 'Line2PK3Forward'){
			for(x=1;x<=2;x++){
				val = (sid == 'Line'+ x +'PK3Forward') ? curvalue : parseInt(document.getElementById('Line'+ x +'PK3ForwardTime').value);
				if(val > vallast || val == 100 ){flag = true;break;}
				curtotal += val;
				vallast = val;
			}
		}else if(sid == 'Line1PK3Defense' || sid == 'Line2PK3Defense'){
			switchValues('Line1PK3DefenseTime', 'Line2PK3DefenseTime');
			for(x=1;x<=2;x++){
				val = (sid == 'Line'+ x +'PK3Defense') ? curvalue : parseInt(document.getElementById('Line'+ x +'PK3DefenseTime').value);
				if(val > vallast || val == 100 ){flag = true;break;}
				curtotal += val;
				vallast = val;
			}
		}

		maxmin = (updown == 'up') ? 100 : 1;
		console.log('🎯 Final check - flag:', flag, 'updown:', updown, 'curtotal:', curtotal, 'maxmin:', maxmin, 'fieldvalue:', fieldvalue, 'curvalue:', curvalue);
		if(!flag && updown == 'up' && curtotal <= maxmin && fieldvalue <= maxmin){
			console.log('✅ Setting value UP:', curvalue);
			document.getElementById(field).value = curvalue;
		}
		if(!flag && updown == 'down' && curtotal >= maxmin && fieldvalue >= maxmin){
			console.log('✅ Setting value DOWN:', curvalue);
			document.getElementById(field).value = curvalue;
		}
	}else{
		// Autres types non gérés - comportement par défaut
		console.log('Type non géré:', type, 'pour le champ:', field);
	}
	line_validator(BlockPlayerFromPlayingLines12,BlockPlayerFromPlayingLines123,BlockPlayerFromPlayingLines12inPPPK,
						ProForceGameStrategiesTo,ProForceGameStrategiesAt5,FarmForceGameStrategiesTo,FarmForceGameStrategiesAt5,
						PullGoalerMinGoal,PullGoalerMinGoalEnforce,PullGoalerMinPct,PullGoalerRemoveGoaliesSecond,PullGoalerMax);	
}
function switchValues(id1, id2){
	if(parseInt(document.getElementById(id1).value) < parseInt(document.getElementById(id2).value)){
		var temp = document.getElementById(id1).value;
		document.getElementById(id1).value = document.getElementById(id2).value;
		document.getElementById(id2).value = temp;
	}
}
function getGroups(){
	var group = [];
	group[0] = ['Line15vs5ForwardCenter','Line15vs5ForwardLeftWing','Line15vs5ForwardRightWing'];
	group[1] = ['Line25vs5ForwardCenter','Line25vs5ForwardLeftWing','Line25vs5ForwardRightWing'];
	group[2] = ['Line35vs5ForwardCenter','Line35vs5ForwardLeftWing','Line35vs5ForwardRightWing'];
	group[3] = ['Line45vs5ForwardCenter','Line45vs5ForwardLeftWing','Line45vs5ForwardRightWing'];
	group[4] = ['Line15vs5DefenseDefense1','Line15vs5DefenseDefense2'];
	group[5] = ['Line25vs5DefenseDefense1','Line25vs5DefenseDefense2'];
	group[6] = ['Line35vs5DefenseDefense1','Line35vs5DefenseDefense2'];
	group[7] = ['Line45vs5DefenseDefense1','Line45vs5DefenseDefense2'];
	group[8] = ['Line1PPForwardCenter','Line1PPForwardLeftWing','Line1PPForwardRightWing','Line1PPDefenseDefense1','Line1PPDefenseDefense2'];
	group[9] = ['Line2PPForwardCenter','Line2PPForwardLeftWing','Line2PPForwardRightWing','Line2PPDefenseDefense1','Line2PPDefenseDefense2'];
	group[10] = ['Line14VS4ForwardCenter','Line14VS4ForwardWing','Line14VS4DefenseDefense1','Line14VS4DefenseDefense2'];
	group[11] = ['Line24VS4ForwardCenter','Line24VS4ForwardWing','Line24VS4DefenseDefense1','Line24VS4DefenseDefense2'];
	group[12] = ['Line1PK4ForwardCenter','Line1PK4ForwardWing','Line1PK4DefenseDefense1','Line1PK4DefenseDefense2'];
	group[13] = ['Line2PK4ForwardCenter','Line2PK4ForwardWing','Line2PK4DefenseDefense1','Line2PK4DefenseDefense2'];
	group[14] = ['Line1PK3ForwardCenter','Line1PK3DefenseDefense1','Line1PK3DefenseDefense2'];
	group[15] = ['Line2PK3ForwardCenter','Line2PK3DefenseDefense1','Line2PK3DefenseDefense2'];
	group[16] = ['Goaler1','Goaler2','Goaler3'];
	group[17] = ['ExtraForwardN1','ExtraForwardN2','ExtraForwardN3'];
	group[18] = ['ExtraForwardPP1','ExtraForwardPP2'];
	group[19] = ['ExtraForwardPK'];
	group[20] = ['ExtraDefenseN1','ExtraDefenseN2','ExtraDefenseN3'];
	group[21] = ['ExtraDefensePK1','ExtraDefensePK2'];
	group[22] = ['ExtraDefensePP'];
	group[23] = ['PenaltyShots1','PenaltyShots2','PenaltyShots3','PenaltyShots4','PenaltyShots5'];
	group[24] = ['LastMinOffForwardCenter','LastMinOffForwardLeftWing','LastMinOffForwardRightWing','LastMinOffDefenseDefense1','LastMinOffDefenseDefense2'];
	group[25] = ['LastMinDefForwardCenter','LastMinDefForwardLeftWing','LastMinDefForwardRightWing','LastMinDefDefenseDefense1','LastMinDefDefenseDefense2'];
	group[26] = ['OTForward1','OTForward2','OTForward3','OTForward4','OTForward5','OTForward6','OTForward7','OTForward8','OTForward9','OTForward10'];
	group[27] = ['OTDefense1','OTDefense2','OTDefense3','OTDefense4','OTDefense5'];
	return group;	
}
function getSections(customOT){
	var groups = getGroups();
	var section = [];
	var numberOfGroups = (customOT) ? groups.length : groups.length - 2;
	for(x=0;x<numberOfGroups;x++){
		section[x] = [];
		for(i=0;i<groups[x].length;i++){
			section[x][i] = document.getElementById(groups[x][i]).value;
		}
	}
	return section;	
}
function getText(){
	text = [];
	text[0] = "5vs5 Forward Line #1";
	text[1] = "5vs5 Forward Line #2";
	text[2] = "5vs5 Forward Line #3";
	text[3] = "5vs5 Forward Line #4";
	text[4] = "5vs5 Defense Line #1";
	text[5] = "5vs5 Defense Line #2";
	text[6] = "5vs5 Defense Line #3";
	text[7] = "5vs5 Defense Line #4";
	text[8] = "PP Line #1";
	text[9] = "PP Line #2";
	text[10] = "4vs4 Line #1";
	text[11] = "4vs4 Line #2";
	text[12] = "PK4 Line #1";
	text[13] = "PK4 Line #2";
	text[14] = "PK3 Line #1";
	text[15] = "PK3 Line #2";
	text[16] = "Goaltending";
	text[17] = "Extra Forward Normal";
	text[18] = "Extra Forward PP";
	text[19] = "Extra Forward PK";
	text[20] = "Extra Defense Normal";
	text[21] = "Extra Defense PK";
	text[22] = "Extra Defense PP";
	text[23] = "Penalty Shots";
	text[24] = "Last Minute Offensive";
	text[25] = "Last Minute Defensive";
	text[26] = "Overtime Forward";
	text[27] = "Overtime Defense";
	return text;
}
function eliminateDuplicates(names) {
	var uniqueNames = [];
	$.each(names, function(i, el){
	    if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
	});
	return uniqueNames;
}
function isDuplicates(arr1,x){
	var arrCount1 = arr1.length;
	
	var arr2 = eliminateDuplicates(arr1);
	var arrCount2 = arr2.length;
	
	var ret = (arrCount1 == arrCount2) ? false : true;

	return ret;
}
function verifyLines(customOT){
	var errortext = "";
	var section = getSections(customOT);
	var text = getText();
	for(x=0;x<section.length;x++){
		if(isDuplicates(section[x],x)){
			errortext += '<div class="erroritem">' + text[x] + '</div>';
		}else{
			for(i=0;i<section[x].length;i++){
				if (x != 16 && section[x][i] == "" || x != 16 && section[x][i].length == 0 || x != 16 && section[x][i] == null || 
					x == 16 && section[x][0] == "" || x == 16 && section[x][0].length == 0 || x == 16 && section[x][0] == null || 
					x == 16 && section[x][1] == "" || x == 16 && section[x][1].length == 0 || x == 16 && section[x][1] == null){
					errortext += '<div class="erroritem">' + text[x] + '</div>';
				}else if(x == 16){

				}
			}
		}
	}

	return errortext;
}
function verifyStrat(){

	var fOF = 10000;
	var fDF = 10000;
	var fPhy = 10000;

	var errortext = '';
	var ss = ['Line15vs5Forward','Line25vs5Forward','Line35vs5Forward','Line45vs5Forward'];
	ss.push('Line15vs5Defense','Line25vs5Defense','Line35vs5Defense','Line45vs5Defense');
	ss.push('Line1PPForward','Line2PPForward','Line1PPDefense','Line2PPDefense');
	ss.push('Line14VS4Forward','Line24VS4Forward','Line14VS4Defense','Line24VS4Defense');
	ss.push('Line1PK4Forward','Line2PK4Forward','Line1PK4Defense','Line2PK4Defense');
	ss.push('Line1PK3Forward','Line2PK3Forward','Line1PK3Defense','Line2PK3Defense');
	ss.push('Strategy1','Strategy2','Strategy3','Strategy4','Strategy5');

	var st = ['Line #1 5vs5 Forward','Line #2 5vs5 Forward','Line #3 5vs5 Forward','Line #4 5vs5 Forward'];
	st.push('Line #1 5vs5 Defense','Line #2 5vs5 Defense','Line #3 5vs5 Defense','Line #4 5vs5 Defense');
	st.push('Line #1 PP Forward','Line #2 PP Forward','Line #1 PP Defense','Line #2 PP Defense');
	st.push('Line #1 4VS4 Forward','Line #2 4VS4 Forward','Line #1 4VS4 Defense','Line #2 4VS4 Defense');
	st.push('Line #1 PK4 Forward','Line #2 PK4 Forward','Line #1 PK4 Defense','Line #2 PK4 Defense');
	st.push('Line #1 PK3 Forward','Line #2 PK3 Forward','Line #1 PK3 Defense','Line #2 PK3 Defense');
	st.push('Winning(1)','Winning(2)','Equal','Losing(1)','Losing(2)');


	for(x=0;x<ss.length;x++){
		
		fPhy = parseInt(document.getElementById(ss[x] + 'Phy').value);
		fDF = parseInt(document.getElementById(ss[x] + 'DF').value);
		fOF = parseInt(document.getElementById(ss[x] + 'OF').value);
		
		if((fOF + fDF + fPhy) != 5){errortext += '<div class="erroritem">Strategy '+ st[x] +'</div>';} 
	}
	
	return errortext;
}
function verifyTime(){
	
	var errortext = '';
	var timetotal = 0;
	var ss = [];
	ss[0] = ['Line15vs5Forward','Line25vs5Forward','Line35vs5Forward','Line45vs5Forward'];
	ss[1] = ['Line15vs5Defense','Line25vs5Defense','Line35vs5Defense','Line45vs5Defense'];
	ss[2] = ['Line1PPForward','Line2PPForward'];
	ss[3] = ['Line1PPDefense','Line2PPDefense'];
	ss[4] = ['Line14VS4Forward','Line24VS4Forward'];
	ss[5] = ['Line14VS4Defense','Line24VS4Defense'];
	ss[6] = ['Line1PK4Forward','Line2PK4Forward'];
	ss[7] = ['Line1PK4Defense','Line2PK4Defense']
	ss[8] = ['Line1PK3Forward','Line2PK3Forward'];
	ss[9] = ['Line1PK3Defense','Line2PK3Defense'];
	
	var st = [];
	st[0] = 'Time 5vs5 Forward';
	st[1] = 'Time 5vs5 Defense';
	st[2] = 'Time PP Forward';
	st[3] = 'Time PP Defense';
	st[4] = 'Time 4vs4 Forward';
	st[5] = 'Time 4vs4 Defense';
	st[6] = 'Time PK4 Forward';
	st[7] = 'Time PK4 Defense';
	st[8] = 'Time PK3 Forward';
	st[9] = 'Time PK3 Defense';
	

	for(x=0;x<ss.length;x++){
		timetotal = 0;
		for(i=0;i<ss[x].length;i++){
			timetotal += parseInt(document.getElementById(ss[x][i] + 'Time').value);
		}

		if(timetotal != 100){
			errortext += '<div class="erroritem">'+ st[x] +'-'+ timetotal +'%</div>';
		}
	}
	return errortext;
}
function findPlayerInRoster(selected,type,league){
	
	var allpos = make_position_list();
	var index = (league === "Pro") ? 0 : 1;
	var pos = allpos[index];
	var foundIt = false;

	var explode = selected.split("|");
	var player = explode[0];

	if(type == 0 || type == 3){
		for(x=0;x<pos[4].length;x++){
			if(player === pos[4][x]){

				foundIt = true;
				break;
			}
		}
	}else if(type == 2){
		for(x=0;x<pos[3].length;x++){
			if(player === pos[3][x]){
				foundIt = true;
				break;
			}
		}
	}else{
		for(x=0;x<3;x++){
			for(i=0;i<pos[x].length;i++){
				if(player === pos[x][i]){
					foundIt = true;
					break;
				}
			}
		}
	}

	return foundIt;
}



function ChangePlayer(id,league,BlockPlayerFromPlayingLines12,BlockPlayerFromPlayingLines123,BlockPlayerFromPlayingLines12inPPPK,ProForceGameStrategiesTo,ProForceGameStrategiesAt5,FarmForceGameStrategiesTo,FarmForceGameStrategiesAt5,PullGoalerMinGoal,PullGoalerMinGoalEnforce,PullGoalerMinPct,PullGoalerRemoveGoaliesSecond,PullGoalerMax,customOT){
	
    console.log("Changing player:", id);
    var selected = document.querySelector('input[name="sltPlayerList"]:checked').value;
	var explode = selected.split("|");
	var groups = getGroups();
	
	var foundIt = 11111110;
	var changeIt = false;
	for(x=0;x<groups.length;x++){
		for(i=0;i<groups[x].length;i++){
			if(id === groups[x][i]){
				foundIt = x;
				break;
			}
		}
	}

	if(selected == ''){
		changeIt = true;
	}else if(foundIt == 16){
		/* Has to be Goalie */
		if(findPlayerInRoster(explode[0],3,league)){changeIt = true;}
	}else if(foundIt >=17 && foundIt <= 19){
		/* Has to be Forward*/
		if(findPlayerInRoster(explode[0],1,league)){changeIt = true;}
	}else if(foundIt >=20 && foundIt <= 22){
		/* Has to be Defense*/
		if(findPlayerInRoster(explode[0],2,league)){changeIt = true;}
	}else{
		/* Has to be Skater */
		if(!findPlayerInRoster(explode[0],3,league)){changeIt = true;}
	}
	
	if(changeIt){
		//alert(foundIt);
        const playerN = explode[0];
		//document.getElementById(id).innerHTML = playerN;
        document.getElementById(id).value = playerN;
        console.log("player:", playerN);
		line_validator(BlockPlayerFromPlayingLines12,BlockPlayerFromPlayingLines123,BlockPlayerFromPlayingLines12inPPPK,
						ProForceGameStrategiesTo,ProForceGameStrategiesAt5,FarmForceGameStrategiesTo,FarmForceGameStrategiesAt5,
						PullGoalerMinGoal,PullGoalerMinGoalEnforce,PullGoalerMinPct,PullGoalerRemoveGoaliesSecond,PullGoalerMax,customOT);
	};
}



function verifyBlockPlayerFromPlaying(Lines12,Lines123,Lines12inPPPK){
	var errortext = '';
	if(Lines12 || Lines123){
		var ss = [];
		var pp = [];
		var check = [];
		var ssuse = [];
		var ppuse = [];

		ss[0] = ['Line15vs5Forward','Line25vs5Forward'];
		ss[1] = ['Line15vs5Defense','Line25vs5Defense'];
		
		pp[0] = ['Center','LeftWing','RightWing'];
		pp[1] = ['Defense1','Defense2'];
		
		check[0] = [];
		check[1] = [];

		var player = '';
		var lineid = '';
		var baseText = 'Duplicate Player Lines 1,2';
		var duplicateText = '';

		if(Lines123){
			ss[0].push('Line35vs5Forward');
			ss[1].push('Line35vs5Defense');
			var baseText = 'Duplicate Player Lines 1,2,3';
			duplicateText += ',3';
		}

		for(var x=0;x<2;x++){
			/* check = []; Remove in STHS 3.2.9 -  Fix an issue where when variable is reset, it allow player to play on same or different line between forward once and defenseman the once.*/
			ssuse = ss[x];
			ppuse = pp[x];
			duplicateText = (x==0) ? "Forward " + baseText : "Defense " + baseText;

			for(var s=0;s<ssuse.length;s++){
				for(p=0;p<ppuse.length;p++){
					lineid = ssuse[s] + ppuse[p];
					player = document.getElementById(lineid).value;
					
					if(inArray(player,check)){
						errortext += '<div class="erroritem">'+ duplicateText +'</div>';
						break;
					}else{
						check.push(player);
					}	
				}
			}
		}		
	}
	
	if(Lines12inPPPK){
		/* PP */
		var ss = [];
		var pp = [];
		var check = [];
		var ssuse = [];
		var ppuse = [];

		ss[0] = ['Line1PPForward','Line2PPForward'];
		ss[1] = ['Line1PPDefense','Line2PPDefense'];
		
		pp[0] = ['Center','LeftWing','RightWing'];
		pp[1] = ['Defense1','Defense2'];
		
		check[0] = [];
		check[1] = [];

		var player = '';
		var lineid = '';
		var baseText = 'Duplicate Player PP Lines 1,2';
		var duplicateText = '';

		for(var x=0;x<2;x++){
			ssuse = ss[x];
			ppuse = pp[x];
			duplicateText = (x==0) ? "Forward " + baseText : "Defense " + baseText;

			for(var s=0;s<ssuse.length;s++){
				for(p=0;p<ppuse.length;p++){
					lineid = ssuse[s] + ppuse[p];
					player = document.getElementById(lineid).value;
					
					if(inArray(player,check)){
						errortext += '<div class="erroritem">'+ duplicateText +'</div>';
						break;
					}else{
						check.push(player);
					}	
				}
			}
		}		
	}
	
	if(Lines12inPPPK){
		/* 4 vs 4 */
		var ss = [];
		var pp = [];
		var check = [];
		var ssuse = [];
		var ppuse = [];

		ss[0] = ['Line14VS4Forward','Line24VS4Forward'];
		ss[1] = ['Line14VS4Defense','Line24VS4Defense'];
		
		pp[0] = ['Center','Wing'];
		pp[1] = ['Defense1','Defense2'];
		
		check[0] = [];
		check[1] = [];

		var player = '';
		var lineid = '';
		var baseText = 'Duplicate Player 4 vs 4 Lines 1,2';
		var duplicateText = '';

		for(var x=0;x<2;x++){
			ssuse = ss[x];
			ppuse = pp[x];
			duplicateText = (x==0) ? "Forward " + baseText : "Defense " + baseText;

			for(var s=0;s<ssuse.length;s++){
				for(p=0;p<ppuse.length;p++){
					lineid = ssuse[s] + ppuse[p];
					player = document.getElementById(lineid).value;
					
					if(inArray(player,check)){
						errortext += '<div class="erroritem">'+ duplicateText +'</div>';
						break;
					}else{
						check.push(player);
					}	
				}
			}
		}		
	}

	if(Lines12inPPPK){
		/* PK4 */
		var ss = [];
		var pp = [];
		var check = [];
		var ssuse = [];
		var ppuse = [];

		ss[0] = ['Line1PK4Forward','Line2PK4Forward'];
		ss[1] = ['Line1PK4Defense','Line2PK4Defense'];
		
		pp[0] = ['Center','Wing'];
		pp[1] = ['Defense1','Defense2'];
		
		check[0] = [];
		check[1] = [];

		var player = '';
		var lineid = '';
		var baseText = 'Duplicate Player PK4 Lines 1,2';
		var duplicateText = '';

		for(var x=0;x<2;x++){
			ssuse = ss[x];
			ppuse = pp[x];
			duplicateText = (x==0) ? "Forward " + baseText : "Defense " + baseText;

			for(var s=0;s<ssuse.length;s++){
				for(p=0;p<ppuse.length;p++){
					lineid = ssuse[s] + ppuse[p];
					player = document.getElementById(lineid).value;
					
					if(inArray(player,check)){
						errortext += '<div class="erroritem">'+ duplicateText +'</div>';
						break;
					}else{
						check.push(player);
					}	
				}
			}
		}		
	}	
	
	if(Lines12inPPPK){
		/* PK3 */
		var ss = [];
		var pp = [];
		var check = [];
		var ssuse = [];
		var ppuse = [];

		ss[0] = ['Line1PK3Forward','Line2PK3Forward'];
		ss[1] = ['Line1PK3Defense','Line2PK3Defense'];
		
		pp[0] = ['Center'];
		pp[1] = ['Defense1','Defense2'];
		
		check[0] = [];
		check[1] = [];

		var player = '';
		var lineid = '';
		var baseText = 'Duplicate Player PK4 Lines 1,2';
		var duplicateText = '';

		for(var x=0;x<2;x++){
			ssuse = ss[x];
			ppuse = pp[x];
			duplicateText = (x==0) ? "Forward " + baseText : "Defense " + baseText;

			for(var s=0;s<ssuse.length;s++){
				for(p=0;p<ppuse.length;p++){
					lineid = ssuse[s] + ppuse[p];
					player = document.getElementById(lineid).value;
					
					if(inArray(player,check)){
						errortext += '<div class="erroritem">'+ duplicateText +'</div>';
						break;
					}else{
						check.push(player);
					}	
				}
			}
		}		
	}	
	
	
	return errortext;
}
function line_validator(BlockPlayerFromPlayingLines12,BlockPlayerFromPlayingLines123,BlockPlayerFromPlayingLines12inPPPK,ProForceGameStrategiesTo,ProForceGameStrategiesAt5,FarmForceGameStrategiesTo,FarmForceGameStrategiesAt5,PullGoalerMinGoal,PullGoalerMinGoalEnforce,PullGoalerMinPct,PullGoalerRemoveGoaliesSecond,PullGoalerMax,customOT){
	var headertext = '';
	var headerstyle = '';
	var display = '';
	var disabled = '';

	var lines = verifyLines(customOT);
	var blockplayer = verifyBlockPlayerFromPlaying(BlockPlayerFromPlayingLines12,BlockPlayerFromPlayingLines123,BlockPlayerFromPlayingLines12inPPPK);
	var strat = verifyStrat();
	var linetime = verifyTime();
	

	
	
	var errors = lines + strat + linetime + blockplayer;
	
	if(errors.trim() === ""){
		headertext = "Lines are Complete";
		headerstyle = "linescomplete";
		disabled = false;
	}else{
		headertext = "Incomplete Lines";
		headerstyle = "error";
		disabled = true;
	}
	display  = "<div class='errorwrapper "+ headerstyle +"'>";
	display += "	<div id='errorheader'>";
	display += "		<div> "+ headertext +"</div>";
	display += "	</div>";
	display += errors;
	display += "</div>";

	document.getElementById('errors').innerHTML = display;	
	document.getElementById('linesubmit').disabled = disabled;
}
function clean_position_list(){
	var positions = make_position_list();
    for(var l=0;l<positions.length;l++){
    	for(var p=0; p<=2; p++) {
    		for(var n=0;n<positions[l][p].length;n++){
    			if(positions[l][p+1].indexOf( positions[l][p][n] ) > -1){
		            var c1 = positions[l][p].length;
		            var c2 = positions[l][p+1].length;
		            if(c1>c2){
		            	positions[l][p].splice(positions[l][p].indexOf(positions[l][p][n]), 1);
		            }else{
		            	positions[l][p+1].splice(positions[l][p+1].indexOf(positions[l][p][n]), 1);
		            }

		        }
    		}
	    }

    }
    
    return positions;
}
function auto_lines(League,BlockPlayerFromPlayingLines12,BlockPlayerFromPlayingLines123,BlockPlayerFromPlayingLines12inPPPK,ProForceGameStrategiesTo,ProForceGameStrategiesAt5,FarmForceGameStrategiesTo,FarmForceGameStrategiesAt5,PullGoalerMinGoal,PullGoalerMinGoalEnforce,PullGoalerMinPct,PullGoalerRemoveGoaliesSecond,PullGoalerMax,customOT){
	
	var intLeague = (League == 'Farm') ? 1: 0;
	var positions = make_position_list();
	var positions = clean_position_list();
	var groups = getGroups();
	var id = '';
	var player;
	var use;
	var d = 0;
	
	// Auto Forward Lines
	for(g=0;g<=3;g++){
		use = 0;
		for(p=0;p<=2;p++){
			id = groups[g][p];
			use = (!(g in positions[intLeague][p])) ? 0 : g;
			player = positions[intLeague][p][use];
			document.getElementById(id).value = player;
		}	
	}

	// Auto Defense lines
	for(g=4;g<=7;g++){
		use = 0;
		for(l=0;l<groups[g].length;l++){
			id = groups[g][l];
			player = positions[intLeague][3][d];
			document.getElementById(id).value = player;
			d++;
			d = (!(d in positions[intLeague][3])) ? 0 : d;
			
		}	
	}
	
	// Auto Power Play Lines
	for(g=8;g<=9;g++){
		use = (g == 8) ? 0 : 1;
		d = (g == 8) ? 0 : 2;
		for(p=0;p<=3;p++){
			if(p == 3){
				document.getElementById(groups[g][p]).value = positions[intLeague][p][d];
				document.getElementById(groups[g][p+1]).value = positions[intLeague][p][d+1];
			}else{
				document.getElementById(groups[g][p]).value = positions[intLeague][p][use];
			}
		}
	}

	// Auto 4vs4 and PK4 Lines
	for(g=10;g<=13;g++){
		use = (g == 10 || g == 12) ? 0 : 1;
		d = (g == 10 || g == 12) ? 0 : 2;
		document.getElementById(groups[g][0]).value = positions[intLeague][0][use];
		document.getElementById(groups[g][1]).value = positions[intLeague][1][use];
		document.getElementById(groups[g][2]).value = positions[intLeague][3][d];
		document.getElementById(groups[g][3]).value = positions[intLeague][3][d+1];
	}

	// Auto PK3 Lines
	for(g=14;g<=15;g++){
		use = (g == 14) ? 0 : 1;
		d = (g == 14) ? 0 : 2;
		document.getElementById(groups[g][0]).value = positions[intLeague][0][use];
		document.getElementById(groups[g][1]).value = positions[intLeague][3][d];
		document.getElementById(groups[g][2]).value = positions[intLeague][3][d+1];
	}
	
	// Auto Goalies
	for(var x=0;x<groups[16].length;x++){
		if(x <= positions[intLeague][4].length - 1){
			document.getElementById(groups[16][x]).value = positions[intLeague][4][x];
		}else{
			document.getElementById(groups[16][x]).value = "";
		}
	}

	// Auto Extra Forwards
	for(var g=17;g<=19;g++){
		var use = 4;
		for(x=0;x<groups[g].length;x++){
			document.getElementById(groups[g][x]).value = positions[intLeague][5][use++];
		}
	}
	
	// Auto Extra Defense
	for(var g=20;g<=22;g++){
		d = positions[intLeague][3].length - 3;
		for(x=0;x<groups[g].length;x++){
			document.getElementById(groups[g][x]).value = positions[intLeague][3][d++];
		}
	}

	// Auto Penalty shots
	for(var x=0;x<groups[23].length;x++){
		document.getElementById(groups[23][x]).value = positions[intLeague][5][x];
		
	}

	// Auto Last Minute Lines
	for(g=24;g<=25;g++){
		use = 0;
		d = 0;
		for(p=0;p<=3;p++){
			if(p == 3){
				document.getElementById(groups[g][p]).value = positions[intLeague][p][d];
				document.getElementById(groups[g][p+1]).value = positions[intLeague][p][d+1];
			}else{
				document.getElementById(groups[g][p]).value = positions[intLeague][p][use];
			}
		}
	}

	// Auto OT Forwards & Defense
	if(customOT){
		for(g=26;g<=27;g++){
			if(g == 26){
				var positionloop = 9;
				var positionuse = 5;
			}else{
				var positionloop = 4;
				var positionuse = 3;
			}

			for(p=0;p<=positionloop;p++){
				document.getElementById(groups[g][p]).value = positions[intLeague][positionuse][p];
			}
		}
	}
	line_validator(BlockPlayerFromPlayingLines12,BlockPlayerFromPlayingLines123,BlockPlayerFromPlayingLines12inPPPK,
						ProForceGameStrategiesTo,ProForceGameStrategiesAt5,FarmForceGameStrategiesTo,FarmForceGameStrategiesAt5,
						PullGoalerMinGoal,PullGoalerMinGoalEnforce,PullGoalerMinPct,PullGoalerRemoveGoaliesSecond,PullGoalerMax,customOT);	
}
function checkCompleteLines(){
	var headertext = '';
	var headerstyle = '';
	var display = '';

	var lines = verifyLines();
	var strat = verifyStrat();
	var linetime = verifyTime();
	
	var errors = lines + strat + linetime;
	
	if(errors.trim() === ""){
		headertext = "Lines are Complete";
		headerstyle = "linescomplete";
	}else{
		headertext = "Incomplete Lines";
		headerstyle = "linesincomplete";
	}
	display  = "<div class='errorwrapper "+ headerstyle +"'>";
	display += "	<div id='errorheader'>";
	display += "		<div> "+ headertext +"</div>";
	display += "	</div>";
	display += errors;
	display += "</div>";

	document.getElementById('errors').innerHTML = display;	
}







function actualizePlayerCard(player) 
{
	document.getElementById("tdName").innerHTML = player.Name;

	const baseURL = "https://assets.nhle.com/mugs/nhl/latest/";
    const imageURL = `${baseURL}${player.NHLID}.png`; // Remplace les 7 chiffres par le NHLID

    // Mettre à jour l'image
    const imageElement = document.getElementById("tdImage");
    imageElement.src = imageURL;
	
	document.getElementById("tdAge").innerHTML = player.Age;
    document.getElementById("tdCountry").innerHTML = player.Country;
   	document.getElementById("tdPos").innerHTML = player.PosC;
	document.getElementById("tdHeight").innerHTML = player.Height;
	document.getElementById("tdWeight").innerHTML = player.Weight;
	document.getElementById("tdBorn").innerHTML = player.AgeDate;


	document.getElementById("tdCON").innerHTML = player.Condition;
	document.getElementById("tdCK").innerHTML = player.CK;
	document.getElementById("tdFG").innerHTML = player.FG;
	document.getElementById("tdDI").innerHTML = player.DI;
	document.getElementById("tdSK").innerHTML = player.SK;
	document.getElementById("tdST").innerHTML = player.ST;
	document.getElementById("tdEN").innerHTML = player.EN;
	document.getElementById("tdDU").innerHTML = player.DU;
	document.getElementById("tdPH").innerHTML = player.PH;
	document.getElementById("tdFO").innerHTML = player.FO;
	document.getElementById("tdPA").innerHTML = player.PA;
	document.getElementById("tdSC").innerHTML = player.SC;
	document.getElementById("tdDF").innerHTML = player.DF;
	document.getElementById("tdPS").innerHTML = player.PS;
	document.getElementById("tdEX").innerHTML = player.EX;
	document.getElementById("tdLD").innerHTML = player.LD;
	document.getElementById("tdOV").innerHTML = player.Overall;

	document.getElementById("tdGP").innerHTML = player.GP;
	document.getElementById("tdG").innerHTML = player.G;
	document.getElementById("tdA").innerHTML = player.A;
	document.getElementById("tdPTS").innerHTML = player.P;
	document.getElementById("td+/-").innerHTML = player.PlusMinus;
	document.getElementById("tdPPG").innerHTML = player.PPG;
	document.getElementById("tdSHG").innerHTML = player.PKG;
	document.getElementById("tdSHOTS").innerHTML = player.SHOTS;
	document.getElementById("tdBS").innerHTML = player.ShotsBlock;
	document.getElementById("tdCHECKS").innerHTML = player.Hits;
	document.getElementById("tdPIM").innerHTML = player.PIM;

	document.getElementById("tdCapHit").innerHTML = player.SalaryAverage;
	document.getElementById("tdNTC").innerHTML = player.NoTrade;
	document.getElementById("tdYearsLeft").innerHTML = player.Contract;
	document.getElementById("tdStatus").innerHTML = player.DraftYear; //place holder


    // etc.....

}


// Side Nav

// Function to open the side navigation and show item info
async function openNav(info) {
    // Set width to display the side navigation
    document.getElementById("sideNavR").style.width = "350px";
    
    

     // Load the external HTML file
    const response = await fetch('../components/PlayerCard.html');
    const playerCardHtml = await response.text();
    document.getElementById("sideNavContent").innerHTML = playerCardHtml;

    //console.log(info)
    actualizePlayerCard(info);


    /*let playerInfoHtml = `<p><strong>Selected Item ID:</strong> ${id}</p>`; 
    playerInfoHtml += '<ul>'; 
    for (const key in info) { 
        if (info.hasOwnProperty(key)) { 
            playerInfoHtml += `<li><strong>${key}:</strong> ${info[key]}</li>`; 
        } 
    } 
    playerInfoHtml += '</ul>'; 
    document.getElementById("sideNavContent").innerHTML = playerInfoHtml;*/
  }
  

  // Function to close the side navigation
  function closeNav() {
    document.getElementById("sideNavR").style.width = "0"; // Hide by setting width back to 0
  }
  

  
// Function to open the side navigation and show item info
function openList() {
    // Set width to display the side navigation
    document.getElementById("sideList").style.width = "350px";
}
  
// Function to close the side navigation
function closeList() {
    document.getElementById("sideList").style.width = "0"; // Hide by setting width back to 0
}
  





//  When all DOM is loaded
 document.addEventListener('DOMContentLoaded', function() {



    

  document.querySelector('.playerselect').addEventListener('dblclick', function (event) {
    const clickedItem = event.target.closest('.list-group-item'); // Check if a list-group-item was clicked
    if (clickedItem) {
        const label = clickedItem.querySelector('label');
        const uniqueID = clickedItem.getAttribute('data-id');
       
        const player = TeamPlayerInfo.find(player => player.Number == uniqueID); 
        console.log(player);

        const info = player;

        //const info = label ? label.innerText : 'No Info';
        //const id = clickedItem.id;
        closeList();
        openNav(info);
    }
});




document.querySelector('.openList').addEventListener('click', function (event) {
  
        openList();
});





 // permet de clicker sur toute la div au lieu de juste le label ou le radio-button pour le selectionner

    // Select all '.option' elements within the '.playerselect' list
    document.querySelectorAll('.playerselect .option').forEach(function(item) {
        item.addEventListener('click', function(event) {

            // Custom behavior when the radio button is clicked
           // closeList();

            // Prevent click propagation if the target is the input or label
            if (event.target.tagName !== 'INPUT' && event.target.tagName !== 'LABEL') {
                // Simulate a click on the radio input within the clicked list item
                this.querySelector('input[type="radio"]').click();
            }
        });
    });


  // Add event listeners to list-group items
  /*document.querySelectorAll('.selectionList .list-group-item ').forEach(item => {
    item.addEventListener('click', function () {
      const info = this.getAttribute('data-info'); // Get the data-info
      const id = this.id; // Get the item's ID
      openNav(info, id); // Pass the info and id to openNav
    });
  });*/


// Add event listener to the player list
/*document.querySelector('.playerselect').addEventListener('click', function (event) {
    const clickedItem = event.target.closest('.list-group-item'); // Check if a list-group-item was clicked
    if (clickedItem) {
      const label = clickedItem.querySelector('label');
      const info = label ? label.innerText : 'No Info';
      const id = clickedItem.id;
    }
  });*/
  





// Add double-tap support for mobile
let lastTapTime = 0;
document.querySelector('.playerselect').addEventListener('touchend', function(event) {
    const currentTime = new Date().getTime();
    const tapLength = currentTime - lastTapTime;
    lastTapTime = currentTime;

    if (tapLength < 500 && tapLength > 0) { // Detect double-tap within 500ms
        const clickedItem = event.target.closest('.list-group-item'); // Check if a list-group-item was clicked
        if (clickedItem) {
            const label = clickedItem.querySelector('label');
            //const info = label ? label.innerText : 'No Info';
            const id = clickedItem.id;

            const uniqueID = clickedItem.getAttribute('data-id');
       
            
            const player = TeamPlayerInfo.find(player => player.Number == uniqueID); 
            console.log(player);
    
            const info = player;

            closeList();
            openNav(info, id);
        }
        event.preventDefault();
    }
});
  
  // add touch support for mobile
  document.querySelectorAll('.sidenavR .list-group-item').forEach(item => {
    item.addEventListener('touchstart', function () {
      const info = this.getAttribute('data-info');
      const id = this.id;
      //openNav(info, id);    //  to do, a voir si ca bug pas... c'est pas un double touch!?
    });
  });



// Close the side nav if clicking outside the list items or side nav
document.addEventListener('click', function (event) {
    const isClickInsideListItem = event.target.closest('.list-group-item');
    const isClickInsideSideNav = event.target.closest('.sidenavR');
  
    // If the click is outside both the list items and side navigation, close the nav
    if (!isClickInsideListItem && !isClickInsideSideNav) {
      closeNav();
    }
  });


















});




jQuery(document).ready(function(){

    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
/*    $('.btn-number').click(function(e){
        e.preventDefault();
        
        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                
                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                } 
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });*/
    $('.input-number').focusin(function(){
    $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {
        
        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());
        
        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        
        
    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
                // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    
});




// helper function

function inArray(needle, haystack) {
	var ret = false;
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle){ret = true;}
    }
    return ret;
}


