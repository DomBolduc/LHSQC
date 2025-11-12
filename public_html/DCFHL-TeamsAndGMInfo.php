<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<script src="STHSMain.js"></script>
<title>DCFHL - Teams And GM Info</title>
<script src="DCFHL.js"></script>
<meta name="author" content="Simon Tremblay, sths.simont.info" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Decription" content="David Cassabon - STHS - Version : 3.4.1.2 - DCFHL-STHS.db - DCFHL-STHSCareerStat.db"/>
<link href="STHSMain.css" rel="stylesheet" type="text/css" />
<style>
@media screen and (max-width: 1160px) {
.STHSWarning {display:block;}
.STHSTeamsAndGMInfo_MainTable tbody td:nth-last-child(1){display:none;}
.STHSTeamsAndGMInfo_MainTable thead th:nth-last-child(1){display:none;}
.STHSTeamsAndGMInfo_MainTable tbody td:nth-last-child(2){display:none;}
.STHSTeamsAndGMInfo_MainTable thead th:nth-last-child(2){display:none;}
.STHSTeamsAndGMInfo_MainTable tbody td:nth-last-child(3){display:none;}
.STHSTeamsAndGMInfo_MainTable thead th:nth-last-child(3){display:none;}
.STHSTeamsAndGMInfo_MainTable tbody td:nth-last-child(4){display:none;}
.STHSTeamsAndGMInfo_MainTable thead th:nth-last-child(4){display:none;}
.STHSTeamsAndGMInfo_MainTable tbody td:nth-last-child(5){display:none;}
.STHSTeamsAndGMInfo_MainTable thead th:nth-last-child(5){display:none;}
.STHSTeamsAndGMInfo_MainTable tbody td:nth-last-child(6){display:none;}
.STHSTeamsAndGMInfo_MainTable thead th:nth-last-child(6){display:none;}
}</style>
<?php If (file_exists("STHSMain-CSSOverwrite.css") == True){echo "<link href=\"STHSMain-CSSOverwrite.css\" rel=\"stylesheet\" type=\"text/css\" />";}?>
<?php If (file_exists("STHSSetting.php") == true){
require_once "STHSSetting.php";
$db = new SQLite3($DatabaseFile);
include "Menu.php";}?>
<table class="STHSTeamsAndGMInfo_MainTable"><thead><tr>
<th>Team Name</th>
<th>General Manager</th>
<th>Instant Messenger</th>
<th>Email</th>
<th>City</th>
<th>Arena</th>
<th>Farm Team Name</th>
<th>Last File Load Date</th>
<th># of Load Lines</th>
<th># of Fail Auto Roster</th>
<th># of Fail Pro Auto Line</th>
<th># of Fail Farm Auto Line</th>
<th># of Fail Simulation</th></tr></thead><tbody>
<tr><td>Avalanche</td>
<td>David Cassabon</td>
<td></td>
<td><a href="mailto:davidcassabon@hotmail.com">davidcassabon@hotmail.com</a></td>
<td>Colorado</td>
<td>Ball Arena</td>
<td>Eagles</td>
<td>May 14, 2016 at 21:33</td>
<td>0</td>
<td>138</td>
<td>49</td>
<td>100</td>
<td>8</td></tr>
<tr><td>Blackhawks</td>
<td>Zachary Sauro</td>
<td>Zachary Sauro</td>
<td><a href="mailto:zachary2004@hotmail.ca">zachary2004@hotmail.ca</a></td>
<td>Chicago</td>
<td>United Center</td>
<td>Icehogs</td>
<td>27 juin 2024 at 19:12</td>
<td>0</td>
<td>199</td>
<td>71</td>
<td>80</td>
<td>69</td></tr>
<tr><td>Blue Jackets</td>
<td>Paolo Clara</td>
<td></td>
<td><a href="mailto:mouni777@hotmail.com">mouni777@hotmail.com</a></td>
<td>Columbus</td>
<td>Nationwide Arena</td>
<td>Monsters</td>
<td>24 juin 2024 at 08:54</td>
<td>0</td>
<td>100</td>
<td>38</td>
<td>62</td>
<td>15</td></tr>
<tr><td>Blues</td>
<td>Renaud Bordeleau</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>St. Louis</td>
<td>Entreprise Center</td>
<td>Thunderbirds</td>
<td>15 mai 2024 at 18:32</td>
<td>0</td>
<td>277</td>
<td>98</td>
<td>91</td>
<td>144</td></tr>
<tr><td>Bruins</td>
<td>Raphael Gascon-Leblanc</td>
<td></td>
<td><a href="mailto:raphaelgasconleblanc@gmail.com">raphaelgasconleblanc@gmail.com</a></td>
<td>Boston</td>
<td>TD Garden</td>
<td>Bruins</td>
<td>28 avril 2024 at 22:52</td>
<td>0</td>
<td>132</td>
<td>40</td>
<td>81</td>
<td>39</td></tr>
<tr><td>Canadiens</td>
<td>Leo Bedard</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>Montreal</td>
<td>Bell Center</td>
<td>Rocket</td>
<td>26 mars 2024 at 22:21</td>
<td>0</td>
<td>129</td>
<td>50</td>
<td>53</td>
<td>87</td></tr>
<tr><td>Canucks</td>
<td>David Plouffe</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>Vancouver</td>
<td>Rogers Arena</td>
<td>Canucks</td>
<td>27 juin 2023 at 19:56</td>
<td>0</td>
<td>277</td>
<td>108</td>
<td>97</td>
<td>117</td></tr>
<tr><td>Capitals</td>
<td>Samuel Desrochers</td>
<td>capitals de washington</td>
<td><a href="mailto:Samueld23@hotmail.ca">Samueld23@hotmail.ca</a></td>
<td>Washington</td>
<td>Capital One Arena</td>
<td>Bears</td>
<td>25 juin 2024 at 19:37</td>
<td>0</td>
<td>176</td>
<td>48</td>
<td>50</td>
<td>96</td></tr>
<tr><td>Devils</td>
<td>Mo Beaudoin</td>
<td></td>
<td><a href="mailto:jean.maurice.beaudoin@hotmail.com">jean.maurice.beaudoin@hotmail.com</a></td>
<td>New Jersey</td>
<td>Prudential Center</td>
<td>Comets</td>
<td>16 mai 2024 at 22:49</td>
<td>0</td>
<td>138</td>
<td>45</td>
<td>69</td>
<td>52</td></tr>
<tr><td>Ducks</td>
<td>William Mo</td>
<td></td>
<td><a href="mailto:william.mo1830@hotmail.com">william.mo1830@hotmail.com</a></td>
<td>Anaheim</td>
<td>Honda Center</td>
<td>Gulls</td>
<td>13 mai 2024 at 19:39</td>
<td>0</td>
<td>112</td>
<td>67</td>
<td>92</td>
<td>77</td></tr>
<tr><td>Flames</td>
<td>Charles Verville</td>
<td></td>
<td><a href="mailto:cv_backup@hotmail.com">cv_backup@hotmail.com</a></td>
<td>Calgary</td>
<td>Scotiabank Saddledome</td>
<td>Wranglers</td>
<td>30 mai 2024 at 20:45</td>
<td>0</td>
<td>190</td>
<td>83</td>
<td>81</td>
<td>55</td></tr>
<tr><td>Flyers</td>
<td>Jacob Lacharite</td>
<td></td>
<td><a href="mailto:jacoblacharite@gmail.com">jacoblacharite@gmail.com</a></td>
<td>Philadelphia</td>
<td>Wells Fargo Center</td>
<td>Phantoms</td>
<td>20 mai 2024 at 09:23</td>
<td>0</td>
<td>119</td>
<td>38</td>
<td>48</td>
<td>29</td></tr>
<tr><td>Golden Knights</td>
<td>Gabriel Mayrand</td>
<td></td>
<td><a href="mailto:dcfhl.commish@gmail.com">dcfhl.commish@gmail.com</a></td>
<td>Vegas</td>
<td>T-Mobile Arena</td>
<td>Silver Knights</td>
<td>2 mars 2024 at 10:33</td>
<td>0</td>
<td>105</td>
<td>17</td>
<td>30</td>
<td>40</td></tr>
<tr><td>Hurricanes</td>
<td>Maxime Quesnel</td>
<td></td>
<td><a href="mailto:mquesnel@hyundaiamos.com">mquesnel@hyundaiamos.com</a></td>
<td>Carolina</td>
<td>PNC Arena</td>
<td>Wolves</td>
<td>27 mai 2024 at 21:04</td>
<td>0</td>
<td>280</td>
<td>130</td>
<td>137</td>
<td>108</td></tr>
<tr><td>Islanders</td>
<td>Yannick Lefebvre</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>New York</td>
<td>UBS Arena</td>
<td>Islanders</td>
<td>13 mars 2024 at 20:44</td>
<td>0</td>
<td>231</td>
<td>80</td>
<td>74</td>
<td>118</td></tr>
<tr><td>Jets</td>
<td>Mathieu Desharnais</td>
<td></td>
<td><a href="mailto:mathieudesharnais@icloud.com">mathieudesharnais@icloud.com</a></td>
<td>Winnipeg</td>
<td>Canada Life Centre</td>
<td>Moose</td>
<td>28 juin 2024 at 12:30</td>
<td>0</td>
<td>40</td>
<td>19</td>
<td>18</td>
<td>5</td></tr>
<tr><td>Kings</td>
<td>Simon Pelchat</td>
<td></td>
<td><a href="mailto:sim972@outlook.fr">sim972@outlook.fr</a></td>
<td>Los Angeles</td>
<td>Crypto.com Arena</td>
<td>Reign</td>
<td>22 juin 2024 at 19:51</td>
<td>0</td>
<td>183</td>
<td>81</td>
<td>92</td>
<td>44</td></tr>
<tr><td>Kraken</td>
<td>David Sirard</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>Seattle</td>
<td>Climate Pledge Arena</td>
<td>Firebirds</td>
<td>27 avril 2024 at 15:49</td>
<td>0</td>
<td>113</td>
<td>43</td>
<td>28</td>
<td>38</td></tr>
<tr><td>Lightning</td>
<td>Francois Burelle</td>
<td></td>
<td><a href="mailto:francois.burelle@gmail.com">francois.burelle@gmail.com</a></td>
<td>Tampa Bay</td>
<td>Amalie Arena</td>
<td>Crunch</td>
<td>30 juin 2024 at 09:40</td>
<td>0</td>
<td>111</td>
<td>39</td>
<td>49</td>
<td>41</td></tr>
<tr><td>Maple Leafs</td>
<td>Alexandre Loignon</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>Toronto</td>
<td>Scotiabank Arena</td>
<td>Marlies</td>
<td>21 avril 2024 at 14:36</td>
<td>0</td>
<td>159</td>
<td>65</td>
<td>76</td>
<td>77</td></tr>
<tr><td>Oilers</td>
<td>Patrick Scinteie</td>
<td></td>
<td><a href="mailto:patrick.scinteie@hotmail.com">patrick.scinteie@hotmail.com</a></td>
<td>Edmonton</td>
<td>Rogers Place</td>
<td>Condors</td>
<td>6 mai 2024 at 22:07</td>
<td>0</td>
<td>203</td>
<td>99</td>
<td>74</td>
<td>53</td></tr>
<tr><td>Panthers</td>
<td>Robert Burelle</td>
<td></td>
<td><a href="mailto:rob_burelle@hotmail.ca">rob_burelle@hotmail.ca</a></td>
<td>Florida</td>
<td>FLA Live Arena</td>
<td>Checkers</td>
<td>19 mai 2024 at 16:06</td>
<td>0</td>
<td>64</td>
<td>15</td>
<td>27</td>
<td>41</td></tr>
<tr><td>Penguins</td>
<td>Alain Pouliot</td>
<td></td>
<td><a href="mailto:poul@live.ca">poul@live.ca</a></td>
<td>Pittsburgh</td>
<td>PPG Paints Arena</td>
<td>Penguins</td>
<td>7 mai 2024 at 21:54</td>
<td>0</td>
<td>200</td>
<td>52</td>
<td>67</td>
<td>66</td></tr>
<tr><td>Predators</td>
<td>Simon Pradella</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>Nashville</td>
<td>Bridgestone Arena</td>
<td>Admirals</td>
<td>6 mai 2024 at 22:07</td>
<td>0</td>
<td>173</td>
<td>70</td>
<td>66</td>
<td>59</td></tr>
<tr><td>Rangers</td>
<td>Maxime Fortin</td>
<td></td>
<td><a href="mailto:max.fortin14@gmail.com">max.fortin14@gmail.com</a></td>
<td>New York</td>
<td>Madison Square Garden</td>
<td>Wolf Pack</td>
<td>29 mars 2024 at 08:50</td>
<td>0</td>
<td>310</td>
<td>89</td>
<td>122</td>
<td>189</td></tr>
<tr><td>Red Wings</td>
<td>Francis Nadeau</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>Detroit</td>
<td>Little Caesars Arena</td>
<td>Griffins</td>
<td>8 mai 2024 at 19:22</td>
<td>0</td>
<td>249</td>
<td>159</td>
<td>116</td>
<td>69</td></tr>
<tr><td>Sabres</td>
<td>Alexandre Lapointe</td>
<td></td>
<td><a href="mailto:alexthegr8@live.ca">alexthegr8@live.ca</a></td>
<td>Buffalo</td>
<td>Keybank Center</td>
<td>Americans</td>
<td>2 mai 2024 at 23:02</td>
<td>0</td>
<td>168</td>
<td>66</td>
<td>68</td>
<td>54</td></tr>
<tr><td>Senators</td>
<td>Dominic Bolduc</td>
<td></td>
<td><a href="mailto:dombasse@hotmail.com">dombasse@hotmail.com</a></td>
<td>Ottawa</td>
<td>Canadian Tire Centre</td>
<td>Senators</td>
<td>27 mai 2024 at 21:04</td>
<td>0</td>
<td>345</td>
<td>104</td>
<td>96</td>
<td>192</td></tr>
<tr><td>Sharks</td>
<td>Alexandre Parent</td>
<td></td>
<td><a href="mailto:Aparent@actiforme.qc.ca">Aparent@actiforme.qc.ca</a></td>
<td>San Jose</td>
<td>SAP Center at San Jose</td>
<td>Barracuda</td>
<td>27 avril 2024 at 15:49</td>
<td>0</td>
<td>271</td>
<td>101</td>
<td>100</td>
<td>122</td></tr>
<tr><td>Stars</td>
<td>Van Thuan Huynh</td>
<td></td>
<td><a href="mailto:vanhuynhmtl@gmail.com">vanhuynhmtl@gmail.com</a></td>
<td>Dallas</td>
<td>American Airlines Center</td>
<td>Stars</td>
<td>14 mai 2024 at 20:27</td>
<td>0</td>
<td>146</td>
<td>69</td>
<td>68</td>
<td>48</td></tr>
<tr><td>Utah Hockey Club</td>
<td>Hugo Duteau</td>
<td></td>
<td><a href="mailto:hugo.duteau@gmail.com">hugo.duteau@gmail.com</a></td>
<td>Utah</td>
<td>Delta Center</td>
<td>Roadrunners</td>
<td>8 juin 2024 at 11:43</td>
<td>0</td>
<td>348</td>
<td>177</td>
<td>166</td>
<td>105</td></tr>
<tr><td>Wild</td>
<td>Hugo Lussier</td>
<td></td>
<td><a href="mailto:"></a></td>
<td>Minnesota</td>
<td>Xcel Energy Center</td>
<td>Wild</td>
<td>1 mai 2024 at 21:45</td>
<td>0</td>
<td>160</td>
<td>62</td>
<td>57</td>
<td>41</td></tr>
</tbody></table><br />
<a href="mailto:davidcassabon@hotmail.com;zachary2004@hotmail.ca;mouni777@hotmail.com;raphaelgasconleblanc@gmail.com;Samueld23@hotmail.ca;jean.maurice.beaudoin@hotmail.com;william.mo1830@hotmail.com;cv_backup@hotmail.com;jacoblacharite@gmail.com;dcfhl.commish@gmail.com;mquesnel@hyundaiamos.com;mathieudesharnais@icloud.com;sim972@outlook.fr;francois.burelle@gmail.com;patrick.scinteie@hotmail.com;rob_burelle@hotmail.ca;poul@live.ca;max.fortin14@gmail.com;alexthegr8@live.ca;dombasse@hotmail.com;Aparent@actiforme.qc.ca;vanhuynhmtl@gmail.com;hugo.duteau@gmail.com">Email all General Manager</a>
<br /><br /><br /><a href="#" class="scrollup">Back to the Top</a><div class="footer">
Output by the <a href="https://sths.simont.info">SimonT Hockey Simulator (STHS)</a> for David Cassabon<span class="FooterW3C"> - Original Page <a href="http://validator.w3.org/check?uri=referer">W3C HTML5 Valid</a></span>
<div style="display:none;visibility:hidden"><a href="https://sths.simont.info">Hockey Simulator</a> - <a href="https://sths.simont.info">Hockey Simulation</a> - <a href="https://sths.simont.info">Hockey Manager</a></div></div>
</body></html>
