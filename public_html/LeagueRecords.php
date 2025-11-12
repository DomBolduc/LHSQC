<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<script src="STHSMain.js"></script>
<title>LHSQC - League Records</title>
<script src="LHSQC.js"></script>
<meta name="author" content="Simon Tremblay, sths.simont.info" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Decription" content="Dom Bolduc - STHS - Version : 3.4.1.2 - LHSQC-STHS.db - LHSQC-STHSCareerStat.db"/>
<link href="STHSMain.css" rel="stylesheet" type="text/css" />
</head><body>
<?php If (file_exists("STHSMain-CSSOverwrite.css") == True){echo "<link href=\"STHSMain-CSSOverwrite.css\" rel=\"stylesheet\" type=\"text/css\" />";}?>
<?php If (file_exists("STHSSetting.php") == true){
require_once "STHSSetting.php";
$db = new SQLite3($DatabaseFile);
include "Menu.php";}?>
<h1 class="STHSLeagueRecord_TeamRecords">Team Records</h1>
<table class="STHSRecordTable">
<tr><td colspan="6"><b>Most Goals in 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Oilers</td><td>2023</td><td>850</td><td>11</td><td></td></tr>
<tr><td>2</td><td>Red Wings</td><td>2014</td><td>1019</td><td>10</td><td></td></tr>
<tr><td>3</td><td>Capitals</td><td>2016</td><td>258</td><td>10</td><td></td></tr>
<tr><td>4</td><td>Blackhawks</td><td>2018</td><td>488</td><td>10</td><td></td></tr>
<tr><td>5</td><td>Canadiens</td><td>2019</td><td>44</td><td>10</td><td></td></tr>
<tr><td>6</td><td>Kings</td><td>2020</td><td>752</td><td>10</td><td></td></tr>
<tr><td>7</td><td>Wild</td><td>2021</td><td>343</td><td>10</td><td></td></tr>
<tr><td>8</td><td>Panthers</td><td>2021</td><td>883</td><td>10</td><td></td></tr>
<tr><td>9</td><td>Maple Leafs</td><td>2022</td><td>96</td><td>10</td><td></td></tr>
<tr><td>10</td><td>Devils</td><td>2008</td><td>238</td><td>9</td><td></td></tr>

<tr><td colspan="6"><b>Most Goals in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Red Wings</td><td>2008</td><td>327</td><td></td><td></td></tr>
<tr><td>2</td><td>Capitals</td><td>2010</td><td>321</td><td></td><td></td></tr>
<tr><td>3</td><td>Blackhawks</td><td>2010</td><td>320</td><td></td><td></td></tr>
<tr><td>4</td><td>Canadiens</td><td>2008</td><td>313</td><td></td><td></td></tr>
<tr><td>5</td><td>Flyers</td><td>2010</td><td>310</td><td></td><td></td></tr>
<tr><td>6</td><td>Kings</td><td>2021</td><td>307</td><td></td><td></td></tr>
<tr><td>7</td><td>Wild</td><td>2021</td><td>304</td><td></td><td></td></tr>
<tr><td>8</td><td>Kings</td><td>2022</td><td>297</td><td></td><td></td></tr>
<tr><td>9</td><td>Capitals</td><td>2021</td><td>294</td><td></td><td></td></tr>
<tr><td>10</td><td>Sabres</td><td>2021</td><td>288</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Goal in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Blues</td><td>2020</td><td>131</td><td></td><td></td></tr>
<tr><td>2</td><td>Canucks</td><td>2015</td><td>142</td><td></td><td></td></tr>
<tr><td>3</td><td>Panthers</td><td>2014</td><td>146</td><td></td><td></td></tr>
<tr><td>4</td><td>Panthers</td><td>2015</td><td>146</td><td></td><td></td></tr>
<tr><td>5</td><td>Rangers</td><td>2020</td><td>150</td><td></td><td></td></tr>
<tr><td>6</td><td>Canadiens</td><td>2013</td><td>152</td><td></td><td></td></tr>
<tr><td>7</td><td>Flames</td><td>2020</td><td>152</td><td></td><td></td></tr>
<tr><td>8</td><td>Capitals</td><td>2020</td><td>156</td><td></td><td></td></tr>
<tr><td>9</td><td>Stars</td><td>2020</td><td>158</td><td></td><td></td></tr>
<tr><td>10</td><td>Devils</td><td>2020</td><td>158</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Goals Against in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Golden Knights</td><td>2022</td><td>320</td><td></td><td></td></tr>
<tr><td>2</td><td>Maple Leafs</td><td>2010</td><td>313</td><td></td><td></td></tr>
<tr><td>3</td><td>Predators</td><td>2010</td><td>312</td><td></td><td></td></tr>
<tr><td>4</td><td>Wild</td><td>2023</td><td>311</td><td></td><td></td></tr>
<tr><td>5</td><td>Lightning</td><td>2010</td><td>310</td><td></td><td></td></tr>
<tr><td>6</td><td>Wild</td><td>2022</td><td>309</td><td></td><td></td></tr>
<tr><td>7</td><td>Flames</td><td>2010</td><td>306</td><td></td><td></td></tr>
<tr><td>8</td><td>Predators</td><td>2022</td><td>306</td><td></td><td></td></tr>
<tr><td>9</td><td>Blue Jackets</td><td>2010</td><td>304</td><td></td><td></td></tr>
<tr><td>10</td><td>Oilers</td><td>2021</td><td>300</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Goal Against in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Maple Leafs</td><td>2020</td><td>143</td><td></td><td></td></tr>
<tr><td>2</td><td>Lightning</td><td>2020</td><td>152</td><td></td><td></td></tr>
<tr><td>3</td><td>Canadiens</td><td>2013</td><td>153</td><td></td><td></td></tr>
<tr><td>4</td><td>Bruins</td><td>2020</td><td>153</td><td></td><td></td></tr>
<tr><td>5</td><td>Islanders</td><td>2020</td><td>155</td><td></td><td></td></tr>
<tr><td>6</td><td>Flyers</td><td>2020</td><td>155</td><td></td><td></td></tr>
<tr><td>7</td><td>Kings</td><td>2020</td><td>157</td><td></td><td></td></tr>
<tr><td>8</td><td>Rangers</td><td>2020</td><td>157</td><td></td><td></td></tr>
<tr><td>9</td><td>Flames</td><td>2020</td><td>159</td><td></td><td></td></tr>
<tr><td>10</td><td>Wild</td><td>2020</td><td>161</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Assists in 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Panthers</td><td>2021</td><td>883</td><td>20</td><td></td></tr>
<tr><td>2</td><td>Red Wings</td><td>2014</td><td>1019</td><td>19</td><td></td></tr>
<tr><td>3</td><td>Kings</td><td>2020</td><td>752</td><td>19</td><td></td></tr>
<tr><td>4</td><td>Maple Leafs</td><td>2022</td><td>96</td><td>19</td><td></td></tr>
<tr><td>5</td><td>Flyers</td><td>2010</td><td>680</td><td>18</td><td></td></tr>
<tr><td>6</td><td>Coyotes</td><td>2010</td><td>683</td><td>18</td><td></td></tr>
<tr><td>7</td><td>Canucks</td><td>2010</td><td>880</td><td>18</td><td></td></tr>
<tr><td>8</td><td>Canucks</td><td>2013</td><td>381</td><td>18</td><td></td></tr>
<tr><td>9</td><td>Capitals</td><td>2016</td><td>258</td><td>18</td><td></td></tr>
<tr><td>10</td><td>Canadiens</td><td>2019</td><td>44</td><td>18</td><td></td></tr>

<tr><td colspan="6"><b>Most Assists in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Capitals</td><td>2010</td><td>582</td><td></td><td></td></tr>
<tr><td>2</td><td>Red Wings</td><td>2008</td><td>574</td><td></td><td></td></tr>
<tr><td>3</td><td>Blackhawks</td><td>2010</td><td>568</td><td></td><td></td></tr>
<tr><td>4</td><td>Flyers</td><td>2010</td><td>557</td><td></td><td></td></tr>
<tr><td>5</td><td>Canadiens</td><td>2008</td><td>549</td><td></td><td></td></tr>
<tr><td>6</td><td>Wild</td><td>2021</td><td>515</td><td></td><td></td></tr>
<tr><td>7</td><td>Kings</td><td>2021</td><td>507</td><td></td><td></td></tr>
<tr><td>8</td><td>Panthers</td><td>2021</td><td>505</td><td></td><td></td></tr>
<tr><td>9</td><td>Kings</td><td>2022</td><td>497</td><td></td><td></td></tr>
<tr><td>10</td><td>Capitals</td><td>2021</td><td>494</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Assist in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Blues</td><td>2020</td><td>220</td><td></td><td></td></tr>
<tr><td>2</td><td>Flames</td><td>2020</td><td>237</td><td></td><td></td></tr>
<tr><td>3</td><td>Rangers</td><td>2020</td><td>250</td><td></td><td></td></tr>
<tr><td>4</td><td>Panthers</td><td>2014</td><td>251</td><td></td><td></td></tr>
<tr><td>5</td><td>Coyotes</td><td>2013</td><td>252</td><td></td><td></td></tr>
<tr><td>6</td><td>Red Wings</td><td>2020</td><td>255</td><td></td><td></td></tr>
<tr><td>7</td><td>Senators</td><td>2020</td><td>255</td><td></td><td></td></tr>
<tr><td>8</td><td>Capitals</td><td>2020</td><td>255</td><td></td><td></td></tr>
<tr><td>9</td><td>Panthers</td><td>2015</td><td>257</td><td></td><td></td></tr>
<tr><td>10</td><td>Blue Jackets</td><td>2020</td><td>257</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Game Points in 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Panthers</td><td>2021</td><td>883</td><td>30</td><td></td></tr>
<tr><td>2</td><td>Red Wings</td><td>2014</td><td>1019</td><td>29</td><td></td></tr>
<tr><td>3</td><td>Kings</td><td>2020</td><td>752</td><td>29</td><td></td></tr>
<tr><td>4</td><td>Maple Leafs</td><td>2022</td><td>96</td><td>29</td><td></td></tr>
<tr><td>5</td><td>Capitals</td><td>2016</td><td>258</td><td>28</td><td></td></tr>
<tr><td>6</td><td>Canadiens</td><td>2019</td><td>44</td><td>28</td><td></td></tr>
<tr><td>7</td><td>Flyers</td><td>2010</td><td>680</td><td>27</td><td></td></tr>
<tr><td>8</td><td>Coyotes</td><td>2010</td><td>683</td><td>27</td><td></td></tr>
<tr><td>9</td><td>Canucks</td><td>2010</td><td>880</td><td>27</td><td></td></tr>
<tr><td>10</td><td>Canucks</td><td>2013</td><td>381</td><td>27</td><td></td></tr>

<tr><td colspan="6"><b>Most Game Points in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>2</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>3</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>4</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>5</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>6</td><td>Wild</td><td>2021</td><td>819</td><td></td><td></td></tr>
<tr><td>7</td><td>Kings</td><td>2021</td><td>814</td><td></td><td></td></tr>
<tr><td>8</td><td>Kings</td><td>2022</td><td>794</td><td></td><td></td></tr>
<tr><td>9</td><td>Panthers</td><td>2021</td><td>792</td><td></td><td></td></tr>
<tr><td>10</td><td>Capitals</td><td>2021</td><td>788</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Game Points  in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Blues</td><td>2020</td><td>351</td><td></td><td></td></tr>
<tr><td>2</td><td>Flames</td><td>2020</td><td>389</td><td></td><td></td></tr>
<tr><td>3</td><td>Panthers</td><td>2014</td><td>397</td><td></td><td></td></tr>
<tr><td>4</td><td>Rangers</td><td>2020</td><td>400</td><td></td><td></td></tr>
<tr><td>5</td><td>Canucks</td><td>2015</td><td>402</td><td></td><td></td></tr>
<tr><td>6</td><td>Panthers</td><td>2015</td><td>403</td><td></td><td></td></tr>
<tr><td>7</td><td>Canadiens</td><td>2013</td><td>410</td><td></td><td></td></tr>
<tr><td>8</td><td>Capitals</td><td>2020</td><td>411</td><td></td><td></td></tr>
<tr><td>9</td><td>Red Wings</td><td>2020</td><td>414</td><td></td><td></td></tr>
<tr><td>10</td><td>Devils</td><td>2020</td><td>416</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Shots In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Maple Leafs</td><td>2008</td><td>967</td><td>69</td><td></td></tr>
<tr><td>2</td><td>Hurricanes</td><td>2020</td><td>600</td><td>65</td><td></td></tr>
<tr><td>3</td><td>Wild</td><td>2023</td><td>41</td><td>64</td><td></td></tr>
<tr><td>4</td><td>Maple Leafs</td><td>2021</td><td>1299</td><td>63</td><td></td></tr>
<tr><td>5</td><td>Red Wings</td><td>2014</td><td>9</td><td>62</td><td></td></tr>
<tr><td>6</td><td>Blue Jackets</td><td>2016</td><td>256</td><td>62</td><td></td></tr>
<tr><td>7</td><td>Coyotes</td><td>2017</td><td>921</td><td>62</td><td></td></tr>
<tr><td>8</td><td>Sharks</td><td>2023</td><td>106</td><td>62</td><td></td></tr>
<tr><td>9</td><td>Kings</td><td>2011</td><td>914</td><td>61</td><td></td></tr>
<tr><td>10</td><td>Lightning</td><td>2015</td><td>165</td><td>61</td><td></td></tr>

<tr><td colspan="6"><b>Most Shots In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Kings</td><td>2021</td><td>3722</td><td></td><td></td></tr>
<tr><td>2</td><td>Wild</td><td>2021</td><td>3718</td><td></td><td></td></tr>
<tr><td>3</td><td>Devils</td><td>2021</td><td>3681</td><td></td><td></td></tr>
<tr><td>4</td><td>Panthers</td><td>2021</td><td>3678</td><td></td><td></td></tr>
<tr><td>5</td><td>Islanders</td><td>2021</td><td>3650</td><td></td><td></td></tr>
<tr><td>6</td><td>Jets</td><td>2021</td><td>3646</td><td></td><td></td></tr>
<tr><td>7</td><td>Penguins</td><td>2021</td><td>3607</td><td></td><td></td></tr>
<tr><td>8</td><td>Flames</td><td>2021</td><td>3602</td><td></td><td></td></tr>
<tr><td>9</td><td>Predators</td><td>2021</td><td>3600</td><td></td><td></td></tr>
<tr><td>10</td><td>Maple Leafs</td><td>2021</td><td>3586</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Shots In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Canadiens</td><td>2013</td><td>1717</td><td></td><td></td></tr>
<tr><td>2</td><td>Canucks</td><td>2015</td><td>1728</td><td></td><td></td></tr>
<tr><td>3</td><td>Panthers</td><td>2015</td><td>1783</td><td></td><td></td></tr>
<tr><td>4</td><td>Flames</td><td>2013</td><td>1792</td><td></td><td></td></tr>
<tr><td>5</td><td>Panthers</td><td>2014</td><td>1848</td><td></td><td></td></tr>
<tr><td>6</td><td>Panthers</td><td>2013</td><td>1862</td><td></td><td></td></tr>
<tr><td>7</td><td>Stars</td><td>2015</td><td>1873</td><td></td><td></td></tr>
<tr><td>8</td><td>Oilers</td><td>2012</td><td>1878</td><td></td><td></td></tr>
<tr><td>9</td><td>Hurricanes</td><td>2013</td><td>1885</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Shots Blocked In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Capitals</td><td>2023</td><td>713</td><td>35</td><td></td></tr>
<tr><td>2</td><td>Flyers</td><td>2021</td><td>1103</td><td>33</td><td></td></tr>
<tr><td>3</td><td>Canucks</td><td>2023</td><td>832</td><td>33</td><td></td></tr>
<tr><td>4</td><td>Senators</td><td>2019</td><td>256</td><td>32</td><td></td></tr>
<tr><td>5</td><td>Predators</td><td>2020</td><td>37</td><td>31</td><td></td></tr>
<tr><td>6</td><td>Ducks</td><td>2020</td><td>273</td><td>31</td><td></td></tr>
<tr><td>7</td><td>Golden Knights</td><td>2020</td><td>149</td><td>30</td><td></td></tr>
<tr><td>8</td><td>Sharks</td><td>2021</td><td>617</td><td>30</td><td></td></tr>
<tr><td>9</td><td>Flyers</td><td>2022</td><td>659</td><td>30</td><td></td></tr>
<tr><td>10</td><td>Hurricanes</td><td>2019</td><td>271</td><td>29</td><td></td></tr>

<tr><td colspan="6"><b>Most Shots Blocked In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>2</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>3</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>4</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>5</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>6</td><td>Capitals</td><td>2021</td><td>1267</td><td></td><td></td></tr>
<tr><td>7</td><td>Jets</td><td>2021</td><td>1253</td><td></td><td></td></tr>
<tr><td>8</td><td>Oilers</td><td>2021</td><td>1245</td><td></td><td></td></tr>
<tr><td>9</td><td>Flyers</td><td>2021</td><td>1229</td><td></td><td></td></tr>
<tr><td>10</td><td>Coyotes</td><td>2021</td><td>1205</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Shots Block In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Flyers</td><td>2013</td><td>521</td><td></td><td></td></tr>
<tr><td>2</td><td>Capitals</td><td>2015</td><td>541</td><td></td><td></td></tr>
<tr><td>3</td><td>Sabres</td><td>2012</td><td>563</td><td></td><td></td></tr>
<tr><td>4</td><td>Blackhawks</td><td>2011</td><td>564</td><td></td><td></td></tr>
<tr><td>5</td><td>Sabres</td><td>2013</td><td>568</td><td></td><td></td></tr>
<tr><td>6</td><td>Panthers</td><td>2013</td><td>569</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Shots Against In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Capitals</td><td>2021</td><td>3789</td><td></td><td></td></tr>
<tr><td>2</td><td>Coyotes</td><td>2021</td><td>3654</td><td></td><td></td></tr>
<tr><td>3</td><td>Jets</td><td>2021</td><td>3619</td><td></td><td></td></tr>
<tr><td>4</td><td>Oilers</td><td>2021</td><td>3613</td><td></td><td></td></tr>
<tr><td>5</td><td>Red Wings</td><td>2021</td><td>3604</td><td></td><td></td></tr>
<tr><td>6</td><td>Bruins</td><td>2021</td><td>3591</td><td></td><td></td></tr>
<tr><td>7</td><td>Canucks</td><td>2021</td><td>3585</td><td></td><td></td></tr>
<tr><td>8</td><td>Wild</td><td>2021</td><td>3582</td><td></td><td></td></tr>
<tr><td>9</td><td>Blue Jackets</td><td>2021</td><td>3576</td><td></td><td></td></tr>
<tr><td>10</td><td>Flames</td><td>2021</td><td>3574</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Shots Against In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Blues</td><td>2012</td><td>1967</td><td></td><td></td></tr>
<tr><td>2</td><td>Flyers</td><td>2013</td><td>1995</td><td></td><td></td></tr>
<tr><td>3</td><td>Capitals</td><td>2012</td><td>2046</td><td></td><td></td></tr>
<tr><td>4</td><td>Sabres</td><td>2012</td><td>2059</td><td></td><td></td></tr>
<tr><td>5</td><td>Blues</td><td>2013</td><td>2075</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Pim In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Predators</td><td>2008</td><td>716</td><td>79</td><td></td></tr>
<tr><td>2</td><td>Blues</td><td>2016</td><td>1190</td><td>70</td><td></td></tr>
<tr><td>3</td><td>Sabres</td><td>2008</td><td>405</td><td>67</td><td></td></tr>
<tr><td>4</td><td>Ducks</td><td>2010</td><td>802</td><td>67</td><td></td></tr>
<tr><td>5</td><td>Coyotes</td><td>2010</td><td>802</td><td>65</td><td></td></tr>
<tr><td>6</td><td>Sabres</td><td>2010</td><td>57</td><td>63</td><td></td></tr>
<tr><td>7</td><td>Jets</td><td>2013</td><td>554</td><td>63</td><td></td></tr>
<tr><td>8</td><td>Ducks</td><td>2016</td><td>405</td><td>61</td><td></td></tr>
<tr><td>9</td><td>Hurricanes</td><td>2016</td><td>1197</td><td>61</td><td></td></tr>
<tr><td>10</td><td>Jets</td><td>2016</td><td>754</td><td>58</td><td></td></tr>

<tr><td colspan="6"><b>Most Pim In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Blue Jackets</td><td>2010</td><td>1421</td><td></td><td></td></tr>
<tr><td>2</td><td>Wild</td><td>2010</td><td>1318</td><td></td><td></td></tr>
<tr><td>3</td><td>Blackhawks</td><td>2010</td><td>1296</td><td></td><td></td></tr>
<tr><td>4</td><td>Canucks</td><td>2010</td><td>1289</td><td></td><td></td></tr>
<tr><td>5</td><td>Blue Jackets</td><td>2008</td><td>1281</td><td></td><td></td></tr>
<tr><td>6</td><td>Predators</td><td>2018</td><td>971</td><td></td><td></td></tr>
<tr><td>7</td><td>Stars</td><td>2023</td><td>967</td><td></td><td></td></tr>
<tr><td>8</td><td>Wild</td><td>2018</td><td>959</td><td></td><td></td></tr>
<tr><td>9</td><td>Oilers</td><td>2018</td><td>939</td><td></td><td></td></tr>
<tr><td>10</td><td>Sabres</td><td>2018</td><td>934</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Pim In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Wild</td><td>2021</td><td>111</td><td></td><td></td></tr>
<tr><td>2</td><td>Jets</td><td>2021</td><td>135</td><td></td><td></td></tr>
<tr><td>3</td><td>Jets</td><td>2020</td><td>152</td><td></td><td></td></tr>
<tr><td>4</td><td>Wild</td><td>2020</td><td>161</td><td></td><td></td></tr>
<tr><td>5</td><td>Islanders</td><td>2021</td><td>179</td><td></td><td></td></tr>
<tr><td>6</td><td>Panthers</td><td>2021</td><td>189</td><td></td><td></td></tr>
<tr><td>7</td><td>Ducks</td><td>2020</td><td>195</td><td></td><td></td></tr>
<tr><td>8</td><td>Panthers</td><td>2020</td><td>202</td><td></td><td></td></tr>
<tr><td>9</td><td>Islanders</td><td>2022</td><td>225</td><td></td><td></td></tr>
<tr><td>10</td><td>Avalanche</td><td>2022</td><td>233</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Hits In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Rangers</td><td>2019</td><td>624</td><td>60</td><td></td></tr>
<tr><td>2</td><td>Predators</td><td>2019</td><td>703</td><td>56</td><td></td></tr>
<tr><td>3</td><td>Canadiens</td><td>2019</td><td>892</td><td>53</td><td></td></tr>
<tr><td>4</td><td>Stars</td><td>2019</td><td>300</td><td>52</td><td></td></tr>
<tr><td>5</td><td>Stars</td><td>2019</td><td>108</td><td>51</td><td></td></tr>
<tr><td>6</td><td>Oilers</td><td>2019</td><td>139</td><td>51</td><td></td></tr>
<tr><td>7</td><td>Lightning</td><td>2019</td><td>572</td><td>51</td><td></td></tr>
<tr><td>8</td><td>Senators</td><td>2019</td><td>1053</td><td>51</td><td></td></tr>
<tr><td>9</td><td>Lightning</td><td>2019</td><td>1100</td><td>51</td><td></td></tr>
<tr><td>10</td><td>Canucks</td><td>2019</td><td>1253</td><td>51</td><td></td></tr>

<tr><td colspan="6"><b>Most Hits In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Devils</td><td>2019</td><td>2801</td><td></td><td></td></tr>
<tr><td>2</td><td>Coyotes</td><td>2019</td><td>2794</td><td></td><td></td></tr>
<tr><td>3</td><td>Lightning</td><td>2019</td><td>2784</td><td></td><td></td></tr>
<tr><td>4</td><td>Sabres</td><td>2019</td><td>2776</td><td></td><td></td></tr>
<tr><td>5</td><td>Oilers</td><td>2019</td><td>2766</td><td></td><td></td></tr>
<tr><td>6</td><td>Canucks</td><td>2019</td><td>2733</td><td></td><td></td></tr>
<tr><td>7</td><td>Stars</td><td>2019</td><td>2730</td><td></td><td></td></tr>
<tr><td>8</td><td>Maple Leafs</td><td>2019</td><td>2710</td><td></td><td></td></tr>
<tr><td>9</td><td>Islanders</td><td>2019</td><td>2703</td><td></td><td></td></tr>
<tr><td>10</td><td>Capitals</td><td>2019</td><td>2689</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Hit In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Panthers</td><td>2013</td><td>1290</td><td></td><td></td></tr>
<tr><td>2</td><td>Sharks</td><td>2013</td><td>1349</td><td></td><td></td></tr>
<tr><td>3</td><td>Blues</td><td>2013</td><td>1352</td><td></td><td></td></tr>
<tr><td>4</td><td>Capitals</td><td>2013</td><td>1363</td><td></td><td></td></tr>
<tr><td>5</td><td>Red Wings</td><td>2013</td><td>1379</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Empty Net Goal In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Ducks</td><td>2023</td><td>9</td><td></td><td></td></tr>
<tr><td>2</td><td>Blackhawks</td><td>2018</td><td>7</td><td></td><td></td></tr>
<tr><td>3</td><td>Blues</td><td>2021</td><td>7</td><td></td><td></td></tr>
<tr><td>4</td><td>Flyers</td><td>2022</td><td>7</td><td></td><td></td></tr>
<tr><td>5</td><td>Blue Jackets</td><td>2012</td><td>6</td><td></td><td></td></tr>
<tr><td>6</td><td>Panthers</td><td>2013</td><td>6</td><td></td><td></td></tr>
<tr><td>7</td><td>Islanders</td><td>2015</td><td>6</td><td></td><td></td></tr>
<tr><td>8</td><td>Bruins</td><td>2016</td><td>6</td><td></td><td></td></tr>
<tr><td>9</td><td>Devils</td><td>2017</td><td>6</td><td></td><td></td></tr>
<tr><td>10</td><td>Devils</td><td>2018</td><td>6</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Best PP In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Hurricanes</td><td>2020</td><td>30.30%</td><td></td><td></td></tr>
<tr><td>2</td><td>Lightning</td><td>2013</td><td>28.30%</td><td></td><td></td></tr>
<tr><td>3</td><td>Devils</td><td>2018</td><td>27.50%</td><td></td><td></td></tr>
<tr><td>4</td><td>Canucks</td><td>2018</td><td>27.10%</td><td></td><td></td></tr>
<tr><td>5</td><td>Coyotes</td><td>2019</td><td>26.90%</td><td></td><td></td></tr>
<tr><td>6</td><td>Maple Leafs</td><td>2018</td><td>26.80%</td><td></td><td></td></tr>
<tr><td>7</td><td>Ducks</td><td>2020</td><td>26.60%</td><td></td><td></td></tr>
<tr><td>8</td><td>Stars</td><td>2013</td><td>26.50%</td><td></td><td></td></tr>
<tr><td>9</td><td>Rangers</td><td>2013</td><td>26.50%</td><td></td><td></td></tr>
<tr><td>10</td><td>Rangers</td><td>2018</td><td>26.50%</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Best PK In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Blue Jackets</td><td>2023</td><td>91.20%</td><td></td><td></td></tr>
<tr><td>2</td><td>Senators</td><td>2014</td><td>90.70%</td><td></td><td></td></tr>
<tr><td>3</td><td>Flames</td><td>2013</td><td>90.00%</td><td></td><td></td></tr>
<tr><td>4</td><td>Maple Leafs</td><td>2015</td><td>89.80%</td><td></td><td></td></tr>
<tr><td>5</td><td>Maple Leafs</td><td>2016</td><td>89.50%</td><td></td><td></td></tr>
<tr><td>6</td><td>Bruins</td><td>2016</td><td>89.00%</td><td></td><td></td></tr>
<tr><td>7</td><td>Hurricanes</td><td>2016</td><td>88.90%</td><td></td><td></td></tr>
<tr><td>8</td><td>Hurricanes</td><td>2013</td><td>88.40%</td><td></td><td></td></tr>
<tr><td>9</td><td>Oilers</td><td>2013</td><td>88.20%</td><td></td><td></td></tr>
<tr><td>10</td><td>Sharks</td><td>2013</td><td>88.20%</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Worse PP In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Red Wings</td><td>2016</td><td>6.60%</td><td></td><td></td></tr>
<tr><td>2</td><td>Hurricanes</td><td>2013</td><td>9.10%</td><td></td><td></td></tr>
<tr><td>3</td><td>Panthers</td><td>2013</td><td>9.90%</td><td></td><td></td></tr>
<tr><td>4</td><td>Lightning</td><td>2017</td><td>9.90%</td><td></td><td></td></tr>
<tr><td>5</td><td>Devils</td><td>2016</td><td>10.40%</td><td></td><td></td></tr>
<tr><td>6</td><td>Oilers</td><td>2015</td><td>10.70%</td><td></td><td></td></tr>
<tr><td>7</td><td>Lightning</td><td>2013</td><td>10.80%</td><td></td><td></td></tr>
<tr><td>8</td><td>Stars</td><td>2015</td><td>10.90%</td><td></td><td></td></tr>
<tr><td>9</td><td>Penguins</td><td>2013</td><td>11.10%</td><td></td><td></td></tr>
<tr><td>10</td><td>Capitals</td><td>2013</td><td>11.50%</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Worse PK In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Oilers</td><td>2018</td><td>71.50%</td><td></td><td></td></tr>
<tr><td>2</td><td>Ducks</td><td>2018</td><td>72.30%</td><td></td><td></td></tr>
<tr><td>3</td><td>Oilers</td><td>2013</td><td>73.60%</td><td></td><td></td></tr>
<tr><td>4</td><td>Kings</td><td>2022</td><td>73.60%</td><td></td><td></td></tr>
<tr><td>5</td><td>Wild</td><td>2013</td><td>73.90%</td><td></td><td></td></tr>
<tr><td>6</td><td>Blackhawks</td><td>2013</td><td>74.00%</td><td></td><td></td></tr>
<tr><td>7</td><td>Jets</td><td>2020</td><td>74.20%</td><td></td><td></td></tr>
<tr><td>8</td><td>Panthers</td><td>2013</td><td>74.30%</td><td></td><td></td></tr>
<tr><td>9</td><td>Golden Knights</td><td>2022</td><td>74.30%</td><td></td><td></td></tr>
<tr><td>10</td><td>Blue Jackets</td><td>2013</td><td>74.40%</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Win In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Avalanche</td><td>2017</td><td>65</td><td></td><td></td></tr>
<tr><td>2</td><td>Canadiens</td><td>2013</td><td>60</td><td></td><td></td></tr>
<tr><td>3</td><td>Canadiens</td><td>2016</td><td>60</td><td></td><td></td></tr>
<tr><td>4</td><td>Wild</td><td>2016</td><td>59</td><td></td><td></td></tr>
<tr><td>5</td><td>Blackhawks</td><td>2013</td><td>58</td><td></td><td></td></tr>
<tr><td>6</td><td>Maple Leafs</td><td>2013</td><td>57</td><td></td><td></td></tr>
<tr><td>7</td><td>Lightning</td><td>2015</td><td>57</td><td></td><td></td></tr>
<tr><td>8</td><td>Red Wings</td><td>2008</td><td>56</td><td></td><td></td></tr>
<tr><td>9</td><td>Canadiens</td><td>2008</td><td>56</td><td></td><td></td></tr>
<tr><td>10</td><td>Blackhawks</td><td>2011</td><td>56</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Win In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Blues</td><td>2020</td><td>14</td><td></td><td></td></tr>
<tr><td>2</td><td>Canucks</td><td>2015</td><td>16</td><td></td><td></td></tr>
<tr><td>3</td><td>Stars</td><td>2015</td><td>17</td><td></td><td></td></tr>
<tr><td>4</td><td>Panthers</td><td>2015</td><td>17</td><td></td><td></td></tr>
<tr><td>5</td><td>Canadiens</td><td>2013</td><td>18</td><td></td><td></td></tr>
<tr><td>6</td><td>Devils</td><td>2020</td><td>19</td><td></td><td></td></tr>
<tr><td>7</td><td>Stars</td><td>2014</td><td>20</td><td></td><td></td></tr>
<tr><td>8</td><td>Panthers</td><td>2014</td><td>21</td><td></td><td></td></tr>
<tr><td>9</td><td>Canucks</td><td>2020</td><td>21</td><td></td><td></td></tr>
<tr><td>10</td><td>Stars</td><td>2020</td><td>22</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Lost In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Canucks</td><td>2015</td><td>66</td><td></td><td></td></tr>
<tr><td>2</td><td>Stars</td><td>2015</td><td>65</td><td></td><td></td></tr>
<tr><td>3</td><td>Panthers</td><td>2015</td><td>65</td><td></td><td></td></tr>
<tr><td>4</td><td>Canadiens</td><td>2013</td><td>64</td><td></td><td></td></tr>
<tr><td>5</td><td>Stars</td><td>2014</td><td>62</td><td></td><td></td></tr>
<tr><td>6</td><td>Panthers</td><td>2014</td><td>61</td><td></td><td></td></tr>
<tr><td>7</td><td>Panthers</td><td>2013</td><td>59</td><td></td><td></td></tr>
<tr><td>8</td><td>Wild</td><td>2023</td><td>58</td><td></td><td></td></tr>
<tr><td>9</td><td>Canadiens</td><td>2012</td><td>57</td><td></td><td></td></tr>
<tr><td>10</td><td>Red Wings</td><td>2023</td><td>57</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Lost In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Avalanche</td><td>2017</td><td>17</td><td></td><td></td></tr>
<tr><td>2</td><td>Maple Leafs</td><td>2020</td><td>18</td><td></td><td></td></tr>
<tr><td>3</td><td>Bruins</td><td>2020</td><td>20</td><td></td><td></td></tr>
<tr><td>4</td><td>Wild</td><td>2020</td><td>20</td><td></td><td></td></tr>
<tr><td>5</td><td>Lightning</td><td>2020</td><td>20</td><td></td><td></td></tr>
<tr><td>6</td><td>Canadiens</td><td>2013</td><td>22</td><td></td><td></td></tr>
<tr><td>7</td><td>Canadiens</td><td>2016</td><td>22</td><td></td><td></td></tr>
<tr><td>8</td><td>Panthers</td><td>2020</td><td>22</td><td></td><td></td></tr>
<tr><td>9</td><td>Islanders</td><td>2020</td><td>22</td><td></td><td></td></tr>
<tr><td>10</td><td>Flyers</td><td>2020</td><td>22</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Points In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Avalanche</td><td>2017</td><td>135</td><td></td><td></td></tr>
<tr><td>2</td><td>Canadiens</td><td>2013</td><td>128</td><td></td><td></td></tr>
<tr><td>3</td><td>Blackhawks</td><td>2013</td><td>124</td><td></td><td></td></tr>
<tr><td>4</td><td>Canadiens</td><td>2016</td><td>123</td><td></td><td></td></tr>
<tr><td>5</td><td>Maple Leafs</td><td>2013</td><td>121</td><td></td><td></td></tr>
<tr><td>6</td><td>Wild</td><td>2016</td><td>121</td><td></td><td></td></tr>
<tr><td>7</td><td>Sabres</td><td>2012</td><td>120</td><td></td><td></td></tr>
<tr><td>8</td><td>Canadiens</td><td>2014</td><td>120</td><td></td><td></td></tr>
<tr><td>9</td><td>Red Wings</td><td>2008</td><td>118</td><td></td><td></td></tr>
<tr><td>10</td><td>Blackhawks</td><td>2011</td><td>118</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Less Points In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Blues</td><td>2020</td><td>39</td><td></td><td></td></tr>
<tr><td>2</td><td>Panthers</td><td>2015</td><td>41</td><td></td><td></td></tr>
<tr><td>3</td><td>Canucks</td><td>2015</td><td>41</td><td></td><td></td></tr>
<tr><td>4</td><td>Stars</td><td>2015</td><td>45</td><td></td><td></td></tr>
<tr><td>5</td><td>Devils</td><td>2020</td><td>45</td><td></td><td></td></tr>
<tr><td>6</td><td>Canadiens</td><td>2013</td><td>46</td><td></td><td></td></tr>
<tr><td>7</td><td>Stars</td><td>2014</td><td>47</td><td></td><td></td></tr>
<tr><td>8</td><td>Panthers</td><td>2014</td><td>47</td><td></td><td></td></tr>
<tr><td>9</td><td>Stars</td><td>2020</td><td>51</td><td></td><td></td></tr>
<tr><td>10</td><td>Capitals</td><td>2020</td><td>53</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Win Home In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>2</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>3</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>4</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>5</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>6</td><td>Kings</td><td>2022</td><td>26</td><td></td><td></td></tr>
<tr><td>7</td><td>Blue Jackets</td><td>2023</td><td>25</td><td></td><td></td></tr>
<tr><td>8</td><td>Penguins</td><td>2022</td><td>24</td><td></td><td></td></tr>
<tr><td>9</td><td>Kraken</td><td>2022</td><td>24</td><td></td><td></td></tr>
<tr><td>10</td><td>Jets</td><td>2021</td><td>23</td><td></td><td></td></tr>

<tr><td colspan="6"><b>Most Win Visitor In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>2</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>3</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>4</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>5</td><td></td><td>0</td><td>32000</td><td></td><td></td></tr>
<tr><td>6</td><td>Panthers</td><td>2018</td><td>25</td><td></td><td></td></tr>
<tr><td>7</td><td>Islanders</td><td>2018</td><td>25</td><td></td><td></td></tr>
<tr><td>8</td><td>Avalanche</td><td>2018</td><td>24</td><td></td><td></td></tr>
<tr><td>9</td><td>Blackhawks</td><td>2019</td><td>24</td><td></td><td></td></tr>
<tr><td>10</td><td>Devils</td><td>2018</td><td>23</td><td></td><td></td></tr>

</table>
<h1 class="STHSLeagueRecord_PlayersRecords">Players Records</h1>
<table class="STHSRecordPlayerGoalerTable">
<tr><td colspan="7"><b>Most Ice Time In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Michael Del Zotto</td><td>Lightning</td><td>2022</td><td>862</td><td>34:35</td><td></td></tr>
<tr><td>2</td><td>Adam Larsson</td><td>Canucks</td><td>2018</td><td>967</td><td>34:14</td><td></td></tr>
<tr><td>3</td><td>Erik Johnson</td><td>Predators</td><td>2017</td><td>879</td><td>33:56</td><td></td></tr>
<tr><td>4</td><td>P.K. Subban</td><td>Capitals</td><td>2021</td><td>84</td><td>33:49</td><td></td></tr>
<tr><td>5</td><td>Kris Letang</td><td>Canadiens</td><td>2022</td><td>185</td><td>33:49</td><td></td></tr>
<tr><td>6</td><td>Brent Burns</td><td>Avalanche</td><td>2018</td><td>950</td><td>33:40</td><td></td></tr>
<tr><td>7</td><td>Trevor van Riemsdyk</td><td>Canucks</td><td>2023</td><td>307</td><td>33:33</td><td></td></tr>
<tr><td>8</td><td>Cody Ceci</td><td>Flyers</td><td>2019</td><td>254</td><td>33:27</td><td></td></tr>
<tr><td>9</td><td>Kris Letang</td><td>Canadiens</td><td>2021</td><td>389</td><td>33:27</td><td></td></tr>
<tr><td>10</td><td>Brent Burns</td><td>Avalanche</td><td>2018</td><td>756</td><td>33:22</td><td></td></tr>

<tr><td colspan="7"><b>Most Ice Time In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Adam Fox</td><td>Hurricanes</td><td>2022</td><td>2470</td><td></td><td></td></tr>
<tr><td>2</td><td>Mattias Ekholm</td><td>Kraken</td><td>2021</td><td>2393</td><td></td><td></td></tr>
<tr><td>3</td><td>Ryan Ellis</td><td>Blue Jackets</td><td>2019</td><td>2380</td><td></td><td></td></tr>
<tr><td>4</td><td>Ryan Pulock</td><td>Golden Knights</td><td>2022</td><td>2377</td><td></td><td></td></tr>
<tr><td>5</td><td>Erik Johnson</td><td>Predators</td><td>2018</td><td>2376</td><td></td><td></td></tr>
<tr><td>6</td><td>Adam Larsson</td><td>Canucks</td><td>2018</td><td>2375</td><td></td><td></td></tr>
<tr><td>7</td><td>John Carlson</td><td>Ducks</td><td>2021</td><td>2369</td><td></td><td></td></tr>
<tr><td>8</td><td>Anton Stralman</td><td>Flyers</td><td>2021</td><td>2367</td><td></td><td></td></tr>
<tr><td>9</td><td>Alex Pietrangelo</td><td>Canucks</td><td>2019</td><td>2361</td><td></td><td></td></tr>
<tr><td>10</td><td>David Savard</td><td>Bruins</td><td>2019</td><td>2360</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Goals In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Henrik Zetterberg</td><td>Red Wings</td><td>2008</td><td>1069</td><td>5</td><td></td></tr>
<tr><td>2</td><td>Sidney Crosby</td><td>Predators</td><td>2014</td><td>46</td><td>5</td><td></td></tr>
<tr><td>3</td><td>Zach Parise</td><td>Flames</td><td>2015</td><td>190</td><td>5</td><td></td></tr>
<tr><td>4</td><td>Tanner Pearson</td><td>Oilers</td><td>2017</td><td>967</td><td>5</td><td></td></tr>
<tr><td>5</td><td>Alexander Ovechkin</td><td>Capitals</td><td>2008</td><td>227</td><td>4</td><td></td></tr>
<tr><td>6</td><td>Evgeni Malkin</td><td>Penguins</td><td>2008</td><td>409</td><td>4</td><td></td></tr>
<tr><td>7</td><td>Tomas Holmstrom</td><td>Red Wings</td><td>2008</td><td>451</td><td>4</td><td></td></tr>
<tr><td>8</td><td>Andrew Brunette</td><td>Canucks</td><td>2010</td><td>115</td><td>4</td><td></td></tr>
<tr><td>9</td><td>Henrik Sedin</td><td>Devils</td><td>2013</td><td>536</td><td>4</td><td></td></tr>
<tr><td>10</td><td>James Neal</td><td>Sharks</td><td>2013</td><td>546</td><td>4</td><td></td></tr>

<tr><td colspan="7"><b>Most Goals In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Henrik Zetterberg</td><td>Red Wings</td><td>2008</td><td>69</td><td></td><td></td></tr>
<tr><td>2</td><td>Aleksander Barkov</td><td>Flyers</td><td>2022</td><td>55</td><td></td><td></td></tr>
<tr><td>3</td><td>Elias Lindholm</td><td>Flames</td><td>2022</td><td>55</td><td></td><td></td></tr>
<tr><td>4</td><td>Taylor Hall</td><td>Kraken</td><td>2022</td><td>53</td><td></td><td></td></tr>
<tr><td>5</td><td>Patrick Marleau</td><td>Maple Leafs</td><td>2014</td><td>52</td><td></td><td></td></tr>
<tr><td>6</td><td>Connor McDavid</td><td>Avalanche</td><td>2018</td><td>51</td><td></td><td></td></tr>
<tr><td>7</td><td>Evgeni Malkin</td><td>Ducks</td><td>2019</td><td>51</td><td></td><td></td></tr>
<tr><td>8</td><td>Tim Stutzle</td><td>Capitals</td><td>2022</td><td>51</td><td></td><td></td></tr>
<tr><td>9</td><td>Jarome Iginla</td><td>Canucks</td><td>2008</td><td>50</td><td></td><td></td></tr>
<tr><td>10</td><td>Pavel Datsyuk</td><td>Red Wings</td><td>2008</td><td>50</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Assists In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Ryan O'Reilly</td><td>Canucks</td><td>2018</td><td>227</td><td>6</td><td></td></tr>
<tr><td>2</td><td>Ilya Mikheyev</td><td>Capitals</td><td>2022</td><td>65</td><td>6</td><td></td></tr>
<tr><td>3</td><td>Robyn Regehr</td><td>Rangers</td><td>2008</td><td>332</td><td>5</td><td></td></tr>
<tr><td>4</td><td>Pavol Demitra</td><td>Maple Leafs</td><td>2008</td><td>967</td><td>5</td><td></td></tr>
<tr><td>5</td><td>Pavel Datsyuk</td><td>Red Wings</td><td>2008</td><td>1069</td><td>5</td><td></td></tr>
<tr><td>6</td><td>Chris Campoli</td><td>Blues</td><td>2010</td><td>167</td><td>5</td><td></td></tr>
<tr><td>7</td><td>Mikko Koivu</td><td>Wild</td><td>2010</td><td>180</td><td>5</td><td></td></tr>
<tr><td>8</td><td>Bryan Little</td><td>Avalanche</td><td>2014</td><td>255</td><td>5</td><td></td></tr>
<tr><td>9</td><td>Anze Kopitar</td><td>Canadiens</td><td>2015</td><td>616</td><td>5</td><td></td></tr>
<tr><td>10</td><td>David Krejci</td><td>Sabres</td><td>2016</td><td>1123</td><td>5</td><td></td></tr>

<tr><td colspan="7"><b>Most Assists In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Nicklas Lidstrom</td><td>Red Wings</td><td>2008</td><td>86</td><td></td><td></td></tr>
<tr><td>2</td><td>Brian Campbell</td><td>Panthers</td><td>2010</td><td>82</td><td></td><td></td></tr>
<tr><td>3</td><td>Mike Green</td><td>Capitals</td><td>2010</td><td>77</td><td></td><td></td></tr>
<tr><td>4</td><td>Ryan Getzlaf</td><td>Maple Leafs</td><td>2014</td><td>77</td><td></td><td></td></tr>
<tr><td>5</td><td>Mark Scheifele</td><td>Panthers</td><td>2018</td><td>75</td><td></td><td></td></tr>
<tr><td>6</td><td>Aleksander Barkov</td><td>Flyers</td><td>2021</td><td>75</td><td></td><td></td></tr>
<tr><td>7</td><td>Leon Draisaitl</td><td>Islanders</td><td>2021</td><td>74</td><td></td><td></td></tr>
<tr><td>8</td><td>Pavel Datsyuk</td><td>Red Wings</td><td>2008</td><td>73</td><td></td><td></td></tr>
<tr><td>9</td><td>Jonathan Toews</td><td>Lightning</td><td>2018</td><td>73</td><td></td><td></td></tr>
<tr><td>10</td><td>John Tavares</td><td>Wild</td><td>2021</td><td>73</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Points In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Max Pacioretty</td><td>Wild</td><td>2018</td><td>78</td><td>7</td><td></td></tr>
<tr><td>2</td><td>Ryan O'Reilly</td><td>Canucks</td><td>2018</td><td>227</td><td>7</td><td></td></tr>
<tr><td>3</td><td>Dylan Larkin</td><td>Canadiens</td><td>2019</td><td>44</td><td>7</td><td></td></tr>
<tr><td>4</td><td>Tomas Plekanec</td><td>Canadiens</td><td>2008</td><td>1210</td><td>6</td><td></td></tr>
<tr><td>5</td><td>Mikko Koivu</td><td>Wild</td><td>2010</td><td>180</td><td>6</td><td></td></tr>
<tr><td>6</td><td>Brian Campbell</td><td>Panthers</td><td>2010</td><td>562</td><td>6</td><td></td></tr>
<tr><td>7</td><td>Evgeni Malkin</td><td>Penguins</td><td>2010</td><td>996</td><td>6</td><td></td></tr>
<tr><td>8</td><td>Anze Kopitar</td><td>Canadiens</td><td>2015</td><td>616</td><td>6</td><td></td></tr>
<tr><td>9</td><td>Jamie Benn</td><td>Stars</td><td>2016</td><td>237</td><td>6</td><td></td></tr>
<tr><td>10</td><td>Nikita Kucherov</td><td>Capitals</td><td>2016</td><td>258</td><td>6</td><td></td></tr>

<tr><td colspan="7"><b>Most Points In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Henrik Zetterberg</td><td>Red Wings</td><td>2008</td><td>134</td><td></td><td></td></tr>
<tr><td>2</td><td>Aleksander Barkov</td><td>Flyers</td><td>2021</td><td>124</td><td></td><td></td></tr>
<tr><td>3</td><td>Pavel Datsyuk</td><td>Red Wings</td><td>2008</td><td>123</td><td></td><td></td></tr>
<tr><td>4</td><td>Ryan Getzlaf</td><td>Maple Leafs</td><td>2014</td><td>122</td><td></td><td></td></tr>
<tr><td>5</td><td>John Tavares</td><td>Wild</td><td>2021</td><td>120</td><td></td><td></td></tr>
<tr><td>6</td><td>Tim Stutzle</td><td>Capitals</td><td>2022</td><td>118</td><td></td><td></td></tr>
<tr><td>7</td><td>Sidney Crosby</td><td>Penguins</td><td>2010</td><td>117</td><td></td><td></td></tr>
<tr><td>8</td><td>Sidney Crosby</td><td>Predators</td><td>2018</td><td>116</td><td></td><td></td></tr>
<tr><td>9</td><td>Matt Duchene</td><td>Canucks</td><td>2018</td><td>115</td><td></td><td></td></tr>
<tr><td>10</td><td>Anze Kopitar</td><td>Canadiens</td><td>2022</td><td>115</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Shots In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Steven Stamkos</td><td>Islanders</td><td>2020</td><td>458</td><td>17</td><td></td></tr>
<tr><td>2</td><td>Taylor Hall</td><td>Kraken</td><td>2021</td><td>155</td><td>17</td><td></td></tr>
<tr><td>3</td><td>Rick Nash</td><td>Lightning</td><td>2015</td><td>165</td><td>16</td><td></td></tr>
<tr><td>4</td><td>Jonathan Huberdeau</td><td>Sharks</td><td>2017</td><td>1139</td><td>16</td><td></td></tr>
<tr><td>5</td><td>Sidney Crosby</td><td>Predators</td><td>2019</td><td>1018</td><td>16</td><td></td></tr>
<tr><td>6</td><td>Jarome Iginla</td><td>Flames</td><td>2008</td><td>673</td><td>15</td><td></td></tr>
<tr><td>7</td><td>Henrik Zetterberg</td><td>Red Wings</td><td>2008</td><td>1106</td><td>15</td><td></td></tr>
<tr><td>8</td><td>David Krejci</td><td>Rangers</td><td>2010</td><td>1147</td><td>15</td><td></td></tr>
<tr><td>9</td><td>Jonathan Toews</td><td>Kings</td><td>2019</td><td>149</td><td>15</td><td></td></tr>
<tr><td>10</td><td>Aleksander Barkov</td><td>Flyers</td><td>2019</td><td>307</td><td>15</td><td></td></tr>

<tr><td colspan="7"><b>Most Shots In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Alex Ovechkin</td><td>Sabres</td><td>2021</td><td>548</td><td></td><td></td></tr>
<tr><td>2</td><td>Filip Forsberg</td><td>Maple Leafs</td><td>2022</td><td>545</td><td></td><td></td></tr>
<tr><td>3</td><td>Aleksander Barkov</td><td>Flyers</td><td>2019</td><td>540</td><td></td><td></td></tr>
<tr><td>4</td><td>Alex Ovechkin</td><td>Sabres</td><td>2019</td><td>535</td><td></td><td></td></tr>
<tr><td>5</td><td>Elias Lindholm</td><td>Flames</td><td>2021</td><td>527</td><td></td><td></td></tr>
<tr><td>6</td><td>Auston Matthews</td><td>Blackhawks</td><td>2021</td><td>519</td><td></td><td></td></tr>
<tr><td>7</td><td>Taylor Hall</td><td>Kraken</td><td>2022</td><td>518</td><td></td><td></td></tr>
<tr><td>8</td><td>Tyler Seguin</td><td>Red Wings</td><td>2019</td><td>508</td><td></td><td></td></tr>
<tr><td>9</td><td>Mitchell Marner</td><td>Bruins</td><td>2022</td><td>505</td><td></td><td></td></tr>
<tr><td>10</td><td>Ryan O'Reilly</td><td>Golden Knights</td><td>2022</td><td>503</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Shots Blocked In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Ryan Suter</td><td>Sabres</td><td>2023</td><td>866</td><td>12</td><td></td></tr>
<tr><td>2</td><td>Matt Bartkowski</td><td>Oilers</td><td>2014</td><td>812</td><td>11</td><td></td></tr>
<tr><td>3</td><td>Freddy Meyer</td><td>Canadiens</td><td>2010</td><td>9</td><td>10</td><td></td></tr>
<tr><td>4</td><td>Brooks Orpik</td><td>Kings</td><td>2016</td><td>45</td><td>10</td><td></td></tr>
<tr><td>5</td><td>Jake Muzzin</td><td>Hurricanes</td><td>2019</td><td>271</td><td>10</td><td></td></tr>
<tr><td>6</td><td>Colin Miller</td><td>Blackhawks</td><td>2019</td><td>314</td><td>10</td><td></td></tr>
<tr><td>7</td><td>Erik Cernak</td><td>Oilers</td><td>2019</td><td>436</td><td>10</td><td></td></tr>
<tr><td>8</td><td>Zach Bogosian</td><td>Lightning</td><td>2019</td><td>863</td><td>10</td><td></td></tr>
<tr><td>9</td><td>Adam Pelech</td><td>Stars</td><td>2021</td><td>1067</td><td>10</td><td></td></tr>
<tr><td>10</td><td>Adam Pelech</td><td>Stars</td><td>2021</td><td>1133</td><td>10</td><td></td></tr>

<tr><td colspan="7"><b>Most Shots Blocked In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>MacKenzie Weegar</td><td>Coyotes</td><td>2021</td><td>218</td><td></td><td></td></tr>
<tr><td>2</td><td>David Savard</td><td>Bruins</td><td>2019</td><td>212</td><td></td><td></td></tr>
<tr><td>3</td><td>Alex Pietrangelo</td><td>Canucks</td><td>2019</td><td>208</td><td></td><td></td></tr>
<tr><td>4</td><td>Ryan Graves</td><td>Bruins</td><td>2021</td><td>202</td><td></td><td></td></tr>
<tr><td>5</td><td>Ryan Ellis</td><td>Blue Jackets</td><td>2019</td><td>196</td><td></td><td></td></tr>
<tr><td>6</td><td>Shea Weber</td><td>Flyers</td><td>2019</td><td>196</td><td></td><td></td></tr>
<tr><td>7</td><td>Anton Stralman</td><td>Flyers</td><td>2021</td><td>196</td><td></td><td></td></tr>
<tr><td>8</td><td>Brent Burns</td><td>Penguins</td><td>2021</td><td>194</td><td></td><td></td></tr>
<tr><td>9</td><td>TJ Brodie</td><td>Wild</td><td>2021</td><td>194</td><td></td><td></td></tr>
<tr><td>10</td><td>Oscar Klefbom</td><td>Canadiens</td><td>2021</td><td>192</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Plus Minus In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Braydon Coburn</td><td>Flyers</td><td>2010</td><td>1222</td><td>6</td><td></td></tr>
<tr><td>2</td><td>Mike Commodore</td><td>Flyers</td><td>2010</td><td>1222</td><td>6</td><td></td></tr>
<tr><td>3</td><td>Corey Perry</td><td>Kings</td><td>2013</td><td>23</td><td>6</td><td></td></tr>
<tr><td>4</td><td>Drew Doughty</td><td>Kings</td><td>2013</td><td>23</td><td>6</td><td></td></tr>
<tr><td>5</td><td>Colin Greening</td><td>Senators</td><td>2013</td><td>156</td><td>6</td><td></td></tr>
<tr><td>6</td><td>Adam Henrique</td><td>Capitals</td><td>2016</td><td>258</td><td>6</td><td></td></tr>
<tr><td>7</td><td>Nikita Kucherov</td><td>Capitals</td><td>2016</td><td>258</td><td>6</td><td></td></tr>
<tr><td>8</td><td>James Neal</td><td>Capitals</td><td>2016</td><td>258</td><td>6</td><td></td></tr>
<tr><td>9</td><td>Mika Zibanejad</td><td>Canadiens</td><td>2019</td><td>44</td><td>6</td><td></td></tr>
<tr><td>10</td><td>Nino Niederreiter</td><td>Canadiens</td><td>2019</td><td>44</td><td>6</td><td></td></tr>

<tr><td colspan="7"><b>Most Plus Minus In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Dainius Zubrus</td><td>Maple Leafs</td><td>2014</td><td>66</td><td></td><td></td></tr>
<tr><td>2</td><td>Ryan Getzlaf</td><td>Maple Leafs</td><td>2014</td><td>66</td><td></td><td></td></tr>
<tr><td>3</td><td>Patrick Marleau</td><td>Maple Leafs</td><td>2014</td><td>64</td><td></td><td></td></tr>
<tr><td>4</td><td>Anze Kopitar</td><td>Kings</td><td>2013</td><td>60</td><td></td><td></td></tr>
<tr><td>5</td><td>Patrick Marleau</td><td>Maple Leafs</td><td>2013</td><td>58</td><td></td><td></td></tr>
<tr><td>6</td><td>Alexandre Burrows</td><td>Kings</td><td>2013</td><td>57</td><td></td><td></td></tr>
<tr><td>7</td><td>Matt Moulson</td><td>Maple Leafs</td><td>2013</td><td>56</td><td></td><td></td></tr>
<tr><td>8</td><td>Ryan Callahan</td><td>Maple Leafs</td><td>2013</td><td>54</td><td></td><td></td></tr>
<tr><td>9</td><td>Marco Scandella</td><td>Jets</td><td>2022</td><td>40</td><td></td><td></td></tr>
<tr><td>10</td><td>Alex Iafallo</td><td>Jets</td><td>2022</td><td>35</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Worse Plus Minus In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Brandon Montour</td><td>Coyotes</td><td>2021</td><td>649</td><td>-6</td><td></td></tr>
<tr><td>2</td><td>Erik Karlsson</td><td>Red Wings</td><td>2021</td><td>883</td><td>-6</td><td></td></tr>
<tr><td>3</td><td>Ryan O'Reilly</td><td>Golden Knights</td><td>2022</td><td>1087</td><td>-6</td><td></td></tr>
<tr><td>4</td><td>Brock Nelson</td><td>Golden Knights</td><td>2022</td><td>1087</td><td>-6</td><td></td></tr>
<tr><td>5</td><td>Mathieu Joseph</td><td>Golden Knights</td><td>2022</td><td>1087</td><td>-6</td><td></td></tr>
<tr><td>6</td><td>Ivan Barbashev</td><td>Blues</td><td>2023</td><td>13</td><td>-6</td><td></td></tr>
<tr><td>7</td><td>Patrik Laine</td><td>Blues</td><td>2023</td><td>13</td><td>-6</td><td></td></tr>
<tr><td>8</td><td>Troy Terry</td><td>Blues</td><td>2023</td><td>13</td><td>-6</td><td></td></tr>
<tr><td>9</td><td>Ales Kotalik</td><td>Predators</td><td>2008</td><td>776</td><td>-5</td><td></td></tr>
<tr><td>10</td><td>Andy Wozniewski</td><td>Predators</td><td>2008</td><td>776</td><td>-5</td><td></td></tr>

<tr><td colspan="7"><b>Worse Plus Minus In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Mark Scheifele</td><td>Canadiens</td><td>2012</td><td>-48</td><td></td><td></td></tr>
<tr><td>2</td><td>Eric Brewer</td><td>Canadiens</td><td>2012</td><td>-47</td><td></td><td></td></tr>
<tr><td>3</td><td>Mark Fayne</td><td>Canucks</td><td>2015</td><td>-47</td><td></td><td></td></tr>
<tr><td>4</td><td>Mike Komisarek</td><td>Canadiens</td><td>2013</td><td>-44</td><td></td><td></td></tr>
<tr><td>5</td><td>Radim Simek</td><td>Wild</td><td>2022</td><td>-44</td><td></td><td></td></tr>
<tr><td>6</td><td>Andrej Meszaros</td><td>Stars</td><td>2014</td><td>-41</td><td></td><td></td></tr>
<tr><td>7</td><td>Ryan Suter</td><td>Penguins</td><td>2019</td><td>-41</td><td></td><td></td></tr>
<tr><td>8</td><td>Alexander Edler</td><td>Red Wings</td><td>2021</td><td>-41</td><td></td><td></td></tr>
<tr><td>9</td><td>Colton Sceviour</td><td>Stars</td><td>2014</td><td>-40</td><td></td><td></td></tr>
<tr><td>10</td><td>Mattias Ekholm</td><td>Kraken</td><td>2021</td><td>-40</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Pim In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Kyle Clifford</td><td>Sharks</td><td>2013</td><td>1023</td><td>44</td><td></td></tr>
<tr><td>2</td><td>Keith Aulie</td><td>Lightning</td><td>2013</td><td>781</td><td>39</td><td></td></tr>
<tr><td>3</td><td>Andrew Desjardins</td><td>Predators</td><td>2013</td><td>1160</td><td>39</td><td></td></tr>
<tr><td>4</td><td>Derek Dorsett</td><td>Rangers</td><td>2013</td><td>1094</td><td>34</td><td></td></tr>
<tr><td>5</td><td>Richard Clune</td><td>Hurricanes</td><td>2013</td><td>259</td><td>29</td><td></td></tr>
<tr><td>6</td><td>Tanner Jeannot</td><td>Capitals</td><td>2023</td><td>396</td><td>29</td><td></td></tr>
<tr><td>7</td><td>Matt Hendricks</td><td>Bruins</td><td>2013</td><td>256</td><td>27</td><td></td></tr>
<tr><td>8</td><td>Barret Jackman</td><td>Jets</td><td>2013</td><td>554</td><td>27</td><td></td></tr>
<tr><td>9</td><td>Matt Cullen</td><td>Blues</td><td>2013</td><td>583</td><td>27</td><td></td></tr>
<tr><td>10</td><td>Radko Gudas</td><td>Blackhawks</td><td>2013</td><td>690</td><td>27</td><td></td></tr>

<tr><td colspan="7"><b>Most Pim In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Wayne Simmonds</td><td>Kings</td><td>2013</td><td>260</td><td></td><td></td></tr>
<tr><td>2</td><td>Kevin Bieksa</td><td>Oilers</td><td>2014</td><td>258</td><td></td><td></td></tr>
<tr><td>3</td><td>Dion Phaneuf</td><td>Flames</td><td>2008</td><td>248</td><td></td><td></td></tr>
<tr><td>4</td><td>Radko Gudas</td><td>Coyotes</td><td>2013</td><td>240</td><td></td><td></td></tr>
<tr><td>5</td><td>Derek Dorsett</td><td>Rangers</td><td>2013</td><td>230</td><td></td><td></td></tr>
<tr><td>6</td><td>Nikita Zadorov</td><td>Oilers</td><td>2018</td><td>228</td><td></td><td></td></tr>
<tr><td>7</td><td>Dustin Byfuglien</td><td>Wild</td><td>2018</td><td>218</td><td></td><td></td></tr>
<tr><td>8</td><td>Mike Commodore</td><td>Blue Jackets</td><td>2008</td><td>217</td><td></td><td></td></tr>
<tr><td>9</td><td>Matt Greene</td><td>Kings</td><td>2008</td><td>217</td><td></td><td></td></tr>
<tr><td>10</td><td>James Wisniewski</td><td>Hurricanes</td><td>2008</td><td>214</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Hits In 1 Game</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Kevin Bieksa</td><td>Oilers</td><td>2014</td><td>435</td><td>15</td><td></td></tr>
<tr><td>2</td><td>Brendan Witt</td><td>Devils</td><td>2008</td><td>619</td><td>14</td><td></td></tr>
<tr><td>3</td><td>Brooks Orpik</td><td>Kings</td><td>2015</td><td>120</td><td>14</td><td></td></tr>
<tr><td>4</td><td>Radko Gudas</td><td>Flyers</td><td>2015</td><td>1150</td><td>14</td><td></td></tr>
<tr><td>5</td><td>Dustin Byfuglien</td><td>Wild</td><td>2016</td><td>1161</td><td>14</td><td></td></tr>
<tr><td>6</td><td>Mattias Ohlund</td><td>Canucks</td><td>2008</td><td>22</td><td>13</td><td></td></tr>
<tr><td>7</td><td>Jack Johnson</td><td>Kings</td><td>2008</td><td>1172</td><td>13</td><td></td></tr>
<tr><td>8</td><td>Brooks Orpik</td><td>Lightning</td><td>2010</td><td>339</td><td>13</td><td></td></tr>
<tr><td>9</td><td>Dion Phaneuf</td><td>Sharks</td><td>2012</td><td>593</td><td>13</td><td></td></tr>
<tr><td>10</td><td>Leo Komarov</td><td>Bruins</td><td>2014</td><td>173</td><td>12</td><td></td></tr>

<tr><td colspan="7"><b>Most Hits In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Dustin Byfuglien</td><td>Wild</td><td>2019</td><td>411</td><td></td><td></td></tr>
<tr><td>2</td><td>David Backes</td><td>Senators</td><td>2014</td><td>369</td><td></td><td></td></tr>
<tr><td>3</td><td>Alexei Emelin</td><td>Oilers</td><td>2015</td><td>367</td><td></td><td></td></tr>
<tr><td>4</td><td>Dion Phaneuf</td><td>Flames</td><td>2008</td><td>359</td><td></td><td></td></tr>
<tr><td>5</td><td>Dion Phaneuf</td><td>Lightning</td><td>2014</td><td>342</td><td></td><td></td></tr>
<tr><td>6</td><td>Tom Wilson</td><td>Predators</td><td>2023</td><td>338</td><td></td><td></td></tr>
<tr><td>7</td><td>Tom Wilson</td><td>Sabres</td><td>2019</td><td>337</td><td></td><td></td></tr>
<tr><td>8</td><td>Mike Komisarek</td><td>Hurricanes</td><td>2010</td><td>334</td><td></td><td></td></tr>
<tr><td>9</td><td>Evander Kane</td><td>Blackhawks</td><td>2019</td><td>334</td><td></td><td></td></tr>
<tr><td>10</td><td>Mike Weber</td><td>Kings</td><td>2014</td><td>332</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Empty Net Goal In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Nate Thompson</td><td>Jets</td><td>2013</td><td>4</td><td></td><td></td></tr>
<tr><td>2</td><td>Zach Parise</td><td>Blackhawks</td><td>2019</td><td>4</td><td></td><td></td></tr>
<tr><td>3</td><td>Josh Anderson</td><td>Predators</td><td>2021</td><td>4</td><td></td><td></td></tr>
<tr><td>4</td><td>Mika Zibanejad</td><td>Canadiens</td><td>2022</td><td>4</td><td></td><td></td></tr>
<tr><td>5</td><td>Tim Stutzle</td><td>Capitals</td><td>2022</td><td>4</td><td></td><td></td></tr>
<tr><td>6</td><td>Phil Kessel</td><td>Rangers</td><td>2013</td><td>3</td><td></td><td></td></tr>
<tr><td>7</td><td>Andrew Ladd</td><td>Islanders</td><td>2013</td><td>3</td><td></td><td></td></tr>
<tr><td>8</td><td>Lars Eller</td><td>Predators</td><td>2013</td><td>3</td><td></td><td></td></tr>
<tr><td>9</td><td>Johan Larsson</td><td>Ducks</td><td>2017</td><td>3</td><td></td><td></td></tr>
<tr><td>10</td><td>Ryan O'Reilly</td><td>Canucks</td><td>2018</td><td>3</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Most Hat Trick In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Alex Kovalev</td><td>Canadiens</td><td>2008</td><td>4</td><td></td><td></td></tr>
<tr><td>2</td><td>Henrik Zetterberg</td><td>Red Wings</td><td>2008</td><td>4</td><td></td><td></td></tr>
<tr><td>3</td><td>Jonathan Toews</td><td>Capitals</td><td>2010</td><td>4</td><td></td><td></td></tr>
<tr><td>4</td><td>Marian Gaborik</td><td>Canucks</td><td>2013</td><td>4</td><td></td><td></td></tr>
<tr><td>5</td><td>Alexander Ovechkin</td><td>Coyotes</td><td>2015</td><td>4</td><td></td><td></td></tr>
<tr><td>6</td><td>Nikolaj Ehlers</td><td>Canucks</td><td>2019</td><td>4</td><td></td><td></td></tr>
<tr><td>7</td><td>Tage Thompson</td><td>Lightning</td><td>2023</td><td>4</td><td></td><td></td></tr>
<tr><td>8</td><td>Evgeni Malkin</td><td>Penguins</td><td>2008</td><td>3</td><td></td><td></td></tr>
<tr><td>9</td><td>Alex Ovechkin</td><td>Sabres</td><td>2019</td><td>3</td><td></td><td></td></tr>
<tr><td>10</td><td>Kasperi Kapanen</td><td>Flyers</td><td>2021</td><td>3</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Best Faceoff in 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Adam Hall</td><td>Maple Leafs</td><td>2013</td><td>62.40%</td><td></td><td></td></tr>
<tr><td>2</td><td>Ryan Kesler</td><td>Hurricanes</td><td>2017</td><td>61.80%</td><td></td><td></td></tr>
<tr><td>3</td><td>Derek Grant</td><td>Kings</td><td>2017</td><td>61.70%</td><td></td><td></td></tr>
<tr><td>4</td><td>Bobby Holik</td><td>Devils</td><td>2008</td><td>61.40%</td><td></td><td></td></tr>
<tr><td>5</td><td>Joe Thornton</td><td>Senators</td><td>2016</td><td>61.40%</td><td></td><td></td></tr>
<tr><td>6</td><td>Matt Cullen</td><td>Avalanche</td><td>2017</td><td>61.40%</td><td></td><td></td></tr>
<tr><td>7</td><td>Steve Ott</td><td>Devils</td><td>2016</td><td>61.30%</td><td></td><td></td></tr>
<tr><td>8</td><td>Matt Hendricks</td><td>Panthers</td><td>2016</td><td>61.00%</td><td></td><td></td></tr>
<tr><td>9</td><td>David Steckel</td><td>Capitals</td><td>2013</td><td>60.80%</td><td></td><td></td></tr>
<tr><td>10</td><td>Joe Thornton</td><td>Sharks</td><td>2013</td><td>60.60%</td><td></td><td></td></tr>

</table>
<h1 class="STHSLeagueRecord_GoaliesRecords">Goalies Records</h1>
<table class="STHSRecordTable">
<tr><td colspan="7"><b>Shutout In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Marc-Andre Fleury</td><td>Maple Leafs</td><td>2014</td><td>12</td><td></td><td></td></tr>
<tr><td>2</td><td>Marc-Andre Fleury</td><td>Maple Leafs</td><td>2015</td><td>12</td><td></td><td></td></tr>
<tr><td>3</td><td>Tuukka Rask</td><td>Senators</td><td>2014</td><td>11</td><td></td><td></td></tr>
<tr><td>4</td><td>Antti Niemi</td><td>Jets</td><td>2014</td><td>11</td><td></td><td></td></tr>
<tr><td>5</td><td>Jonathan Bernier</td><td>Coyotes</td><td>2015</td><td>10</td><td></td><td></td></tr>
<tr><td>6</td><td>Pekka Rinne</td><td>Blues</td><td>2012</td><td>9</td><td></td><td></td></tr>
<tr><td>7</td><td>Niklas Backstrom</td><td>Stars</td><td>2010</td><td>8</td><td></td><td></td></tr>
<tr><td>8</td><td>Jimmy Howard</td><td>Red Wings</td><td>2011</td><td>8</td><td></td><td></td></tr>
<tr><td>9</td><td>Henrik Lundqvist</td><td>Sabres</td><td>2013</td><td>8</td><td></td><td></td></tr>
<tr><td>10</td><td>Ryan Miller</td><td>Senators</td><td>2013</td><td>8</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Shots Received In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Devan Dubnyk</td><td>Sharks</td><td>2019</td><td>2952</td><td></td><td></td></tr>
<tr><td>2</td><td>Andrei Vasilevskiy</td><td>Islanders</td><td>2019</td><td>2859</td><td></td><td></td></tr>
<tr><td>3</td><td>James Reimer</td><td>Flyers</td><td>2019</td><td>2839</td><td></td><td></td></tr>
<tr><td>4</td><td>Robin Lehner</td><td>Coyotes</td><td>2019</td><td>2827</td><td></td><td></td></tr>
<tr><td>5</td><td>Carey Price</td><td>Predators</td><td>2019</td><td>2819</td><td></td><td></td></tr>
<tr><td>6</td><td>Martin Jones</td><td>Canadiens</td><td>2019</td><td>2814</td><td></td><td></td></tr>
<tr><td>7</td><td>Ben Bishop</td><td>Canucks</td><td>2019</td><td>2813</td><td></td><td></td></tr>
<tr><td>8</td><td>Thomas Greiss</td><td>Wild</td><td>2019</td><td>2776</td><td></td><td></td></tr>
<tr><td>9</td><td>Jonathan Quick</td><td>Hurricanes</td><td>2019</td><td>2760</td><td></td><td></td></tr>
<tr><td>10</td><td>Philipp Grubauer</td><td>Rangers</td><td>2019</td><td>2754</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Win In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Martin Jones</td><td>Canadiens</td><td>2016</td><td>56</td><td></td><td></td></tr>
<tr><td>2</td><td>Marc-Andre Fleury</td><td>Avalanche</td><td>2017</td><td>55</td><td></td><td></td></tr>
<tr><td>3</td><td>Craig Anderson</td><td>Flyers</td><td>2013</td><td>51</td><td></td><td></td></tr>
<tr><td>4</td><td>Sergei Bobrovsky</td><td>Canadiens</td><td>2014</td><td>51</td><td></td><td></td></tr>
<tr><td>5</td><td>Henrik Lundqvist</td><td>Sabres</td><td>2012</td><td>50</td><td></td><td></td></tr>
<tr><td>6</td><td>Cory Schneider</td><td>Wild</td><td>2016</td><td>50</td><td></td><td></td></tr>
<tr><td>7</td><td>Roberto Luongo</td><td>Canucks</td><td>2008</td><td>49</td><td></td><td></td></tr>
<tr><td>8</td><td>Martin Jones</td><td>Canadiens</td><td>2019</td><td>49</td><td></td><td></td></tr>
<tr><td>9</td><td>Martin Jones</td><td>Canadiens</td><td>2018</td><td>48</td><td></td><td></td></tr>
<tr><td>10</td><td>Niklas Backstrom</td><td>Stars</td><td>2010</td><td>47</td><td></td><td></td></tr>

<tr><td colspan="7"><b>Lost In 1 Year</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Player Name</td><td class="STHSW200">Team Name</td><td class="STHSW50">Year</td><td class="STHSW75">Value</td><td></td><td></td></tr>
<tr><td>1</td><td>Niklas Backstrom</td><td>Canucks</td><td>2015</td><td>47</td><td></td><td></td></tr>
<tr><td>2</td><td>Petr Mrazek</td><td>Panthers</td><td>2015</td><td>45</td><td></td><td></td></tr>
<tr><td>3</td><td>Jimmy Howard</td><td>Lightning</td><td>2016</td><td>43</td><td></td><td></td></tr>
<tr><td>4</td><td>Petr Mrazek</td><td>Panthers</td><td>2016</td><td>39</td><td></td><td></td></tr>
<tr><td>5</td><td>Cam Ward</td><td>Rangers</td><td>2016</td><td>38</td><td></td><td></td></tr>
<tr><td>6</td><td>Jon Quick</td><td>Rangers</td><td>2015</td><td>37</td><td></td><td></td></tr>
<tr><td>7</td><td>Ben Bishop</td><td>Panthers</td><td>2013</td><td>36</td><td></td><td></td></tr>
<tr><td>8</td><td>Sergei Bobrovsky</td><td>Lightning</td><td>2012</td><td>35</td><td></td><td></td></tr>
<tr><td>9</td><td>Miikka Kiprusoff</td><td>Bruins</td><td>2013</td><td>35</td><td></td><td></td></tr>
<tr><td>10</td><td>Frederik Andersen</td><td>Maple Leafs</td><td>2019</td><td>35</td><td></td><td></td></tr>

</table>
<h1 class="STHSLeagueRecord_GameRecords">Game Records</h1>
<table class="STHSRecordPlayerGoalerTable">
<tr><td colspan="7"><b>Most Goals</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Home Team Name</td><td class="STHSW200">Visitor Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Sabres</td><td>Devils</td><td>2008</td><td>238</td><td>16</td><td></td></tr>
<tr><td>2</td><td>Panthers</td><td>Sabres</td><td>2010</td><td>535</td><td>16</td><td></td></tr>
<tr><td>3</td><td>Ducks</td><td>Red Wings</td><td>2008</td><td>861</td><td>15</td><td></td></tr>
<tr><td>4</td><td>Lightning</td><td>Capitals</td><td>2010</td><td>727</td><td>15</td><td></td></tr>
<tr><td>5</td><td>Wild</td><td>Capitals</td><td>2010</td><td>939</td><td>15</td><td></td></tr>
<tr><td>6</td><td>Stars</td><td>Blackhawks</td><td>2017</td><td>1016</td><td>15</td><td></td></tr>
<tr><td>7</td><td>Oilers</td><td>Ducks</td><td>2019</td><td>1174</td><td>15</td><td></td></tr>
<tr><td>8</td><td>Stars</td><td>Oilers</td><td>2023</td><td>850</td><td>15</td><td></td></tr>
<tr><td>9</td><td>Avalanche</td><td>Hurricanes</td><td>2013</td><td>831</td><td>14</td><td></td></tr>
<tr><td>10</td><td>Blackhawks</td><td>Jets</td><td>2018</td><td>488</td><td>14</td><td></td></tr>

<tr><td colspan="7"><b>Most Assists</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Home Team Name</td><td class="STHSW200">Visitor Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Ducks</td><td>Red Wings</td><td>2008</td><td>861</td><td>29</td><td></td></tr>
<tr><td>2</td><td>Panthers</td><td>Sabres</td><td>2010</td><td>535</td><td>29</td><td></td></tr>
<tr><td>3</td><td>Wild</td><td>Capitals</td><td>2010</td><td>939</td><td>29</td><td></td></tr>
<tr><td>4</td><td>Sabres</td><td>Devils</td><td>2008</td><td>238</td><td>27</td><td></td></tr>
<tr><td>5</td><td>Oilers</td><td>Ducks</td><td>2019</td><td>1174</td><td>27</td><td></td></tr>
<tr><td>6</td><td>Rangers</td><td>Flyers</td><td>2008</td><td>332</td><td>26</td><td></td></tr>
<tr><td>7</td><td>Capitals</td><td>Blackhawks</td><td>2021</td><td>355</td><td>26</td><td></td></tr>
<tr><td>8</td><td>Hurricanes</td><td>Maple Leafs</td><td>2019</td><td>1195</td><td>25</td><td></td></tr>
<tr><td>9</td><td>Golden Knights</td><td>Maple Leafs</td><td>2022</td><td>96</td><td>25</td><td></td></tr>
<tr><td>10</td><td>Flames</td><td>Wild</td><td>2022</td><td>414</td><td>25</td><td></td></tr>

<tr><td colspan="7"><b>Most Points</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Home Team Name</td><td class="STHSW200">Visitor Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Panthers</td><td>Sabres</td><td>2010</td><td>535</td><td>45</td><td></td></tr>
<tr><td>2</td><td>Ducks</td><td>Red Wings</td><td>2008</td><td>861</td><td>44</td><td></td></tr>
<tr><td>3</td><td>Wild</td><td>Capitals</td><td>2010</td><td>939</td><td>44</td><td></td></tr>
<tr><td>4</td><td>Sabres</td><td>Devils</td><td>2008</td><td>238</td><td>43</td><td></td></tr>
<tr><td>5</td><td>Oilers</td><td>Ducks</td><td>2019</td><td>1174</td><td>42</td><td></td></tr>
<tr><td>6</td><td>Lightning</td><td>Capitals</td><td>2010</td><td>727</td><td>40</td><td></td></tr>
<tr><td>7</td><td>Capitals</td><td>Blackhawks</td><td>2021</td><td>355</td><td>40</td><td></td></tr>
<tr><td>8</td><td>Stars</td><td>Blackhawks</td><td>2017</td><td>1016</td><td>39</td><td></td></tr>
<tr><td>9</td><td>Hurricanes</td><td>Maple Leafs</td><td>2019</td><td>1195</td><td>39</td><td></td></tr>
<tr><td>10</td><td>Golden Knights</td><td>Maple Leafs</td><td>2022</td><td>96</td><td>39</td><td></td></tr>

<tr><td colspan="7"><b>Most Shots</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Home Team Name</td><td class="STHSW200">Visitor Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Flyers</td><td>Capitals</td><td>2010</td><td>1204</td><td>110</td><td></td></tr>
<tr><td>2</td><td>Jets</td><td>Wild</td><td>2022</td><td>552</td><td>110</td><td></td></tr>
<tr><td>3</td><td>Capitals</td><td>Devils</td><td>2021</td><td>578</td><td>109</td><td></td></tr>
<tr><td>4</td><td>Devils</td><td>Blue Jackets</td><td>2019</td><td>1171</td><td>108</td><td></td></tr>
<tr><td>5</td><td>Sharks</td><td>Capitals</td><td>2021</td><td>273</td><td>108</td><td></td></tr>
<tr><td>6</td><td>Wild</td><td>Capitals</td><td>2021</td><td>622</td><td>108</td><td></td></tr>
<tr><td>7</td><td>Stars</td><td>Jets</td><td>2021</td><td>813</td><td>108</td><td></td></tr>
<tr><td>8</td><td>Flames</td><td>Coyotes</td><td>2021</td><td>1032</td><td>108</td><td></td></tr>
<tr><td>9</td><td>Flyers</td><td>Coyotes</td><td>2017</td><td>921</td><td>107</td><td></td></tr>
<tr><td>10</td><td>Maple Leafs</td><td>Canadiens</td><td>2020</td><td>238</td><td>107</td><td></td></tr>

<tr><td colspan="7"><b>Most Pim</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Home Team Name</td><td class="STHSW200">Visitor Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Ducks</td><td>Coyotes</td><td>2010</td><td>802</td><td>132</td><td></td></tr>
<tr><td>2</td><td>Canucks</td><td>Predators</td><td>2008</td><td>716</td><td>126</td><td></td></tr>
<tr><td>3</td><td>Blues</td><td>Jets</td><td>2016</td><td>1190</td><td>120</td><td></td></tr>
<tr><td>4</td><td>Thrashers</td><td>Panthers</td><td>2011</td><td>1117</td><td>118</td><td></td></tr>
<tr><td>5</td><td>Bruins</td><td>Sabres</td><td>2010</td><td>57</td><td>117</td><td></td></tr>
<tr><td>6</td><td>Canucks</td><td>Wild</td><td>2010</td><td>351</td><td>116</td><td></td></tr>
<tr><td>7</td><td>Hurricanes</td><td>Islanders</td><td>2016</td><td>1197</td><td>116</td><td></td></tr>
<tr><td>8</td><td>Hurricanes</td><td>Lightning</td><td>2013</td><td>1181</td><td>104</td><td></td></tr>
<tr><td>9</td><td>Flyers</td><td>Islanders</td><td>2017</td><td>615</td><td>104</td><td></td></tr>
<tr><td>10</td><td>Blues</td><td>Jets</td><td>2016</td><td>754</td><td>102</td><td></td></tr>

<tr><td colspan="7"><b>Most Hits</b></td></tr>
<tr><td class="STHSW30">#</td><td class="STHSW200">Home Team Name</td><td class="STHSW200">Visitor Team Name</td><td class="STHSW50">Year</td><td class="STHSW50">Game</td><td class="STHSW75">Value</td><td class="STHSW120">Link</td></tr>
<tr><td>1</td><td>Blues</td><td>Kings</td><td>2021</td><td>76</td><td>98</td><td></td></tr>
<tr><td>2</td><td>Wild</td><td>Penguins</td><td>2019</td><td>71</td><td>91</td><td></td></tr>
<tr><td>3</td><td>Canadiens</td><td>Maple Leafs</td><td>2020</td><td>820</td><td>91</td><td></td></tr>
<tr><td>4</td><td>Stars</td><td>Blackhawks</td><td>2020</td><td>415</td><td>90</td><td></td></tr>
<tr><td>5</td><td>Jets</td><td>Predators</td><td>2019</td><td>703</td><td>89</td><td></td></tr>
<tr><td>6</td><td>Golden Knights</td><td>Hurricanes</td><td>2019</td><td>854</td><td>89</td><td></td></tr>
<tr><td>7</td><td>Lightning</td><td>Predators</td><td>2017</td><td>822</td><td>88</td><td></td></tr>
<tr><td>8</td><td>Stars</td><td>Flames</td><td>2019</td><td>55</td><td>88</td><td></td></tr>
<tr><td>9</td><td>Senators</td><td>Flyers</td><td>2019</td><td>298</td><td>88</td><td></td></tr>
<tr><td>10</td><td>Oilers</td><td>Rangers</td><td>2019</td><td>624</td><td>88</td><td></td></tr>

</table>
<?php include "Footer.php";?>
