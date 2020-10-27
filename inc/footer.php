<footer class="footer_desktop">
  <div class="bottom">
    <p>2020 &copy; | NHL Stenden Emmen - ICT Portal</p>
    <div class="footer_desktop-right">
      <ul class="siteNav">
        <li><a href="nieuws"><?php echo $lang['NAV_NIEUWS']; ?> |</a></li>
        <li><a href="vakken"><?php echo $lang['NAV_VAKKEN']; ?> |</a></li>
        <li><a href="docenten"><?php echo $lang['NAV_DOCENTEN']; ?> |</a></li>
        <li><a href="contact"><?php echo $lang['NAV_CONTACT']; ?> |</a></li>
        <li><a href="privacyPolicy"><?php echo $lang['NAV_PRIVACY_POLICY']; ?> |</a></li>
        <li><a href="termsAndConditions"><?php echo $lang['NAV_TERMS_CONDITIONS']; ?></a></li>
      </ul>
    </div>
  </div>
</footer>

<!-- Mobile Tabs -->
<div class="footer-mobile">
  <style>
  .container {
    width: 100%;
    padding: 5vw;
    display: grid;
    grid-template-rows: auto;
    grid-template-columns: auto;
    overflow-x: auto;
    background: red;
  }
  .item {
    grid-row: 1;
    min-width: 20vw;  
  }
  .dropbtn1 {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown1 {
    position: relative;
    display: inline-block;
}

.dropdown-content1 {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content1 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content1 a:hover {background-color: #f1f1f1}

.dropdown1:hover .dropdown-content1 {
    display: block;
    position: absolute;
    bottom: 100%;
    top: 0;
}

.dropdown1:hover .dropbtn1 {
    background-color: #3e8e41;
}
</style>

<div class='container'>
    <p class="item">info</p>
    <p class="item">news</p>
    <p class="item">banaan</p>
    <p class="item">appel</p>
    <p class="item">thee</p>
    <p class="item">koffie</p>
    <p class="item">meer</p>
    <p class="item">zee</p>
    <div class="dropdown1 item">
      <button class="dropbtn1">Dropdown</button>
    </div>
  </div>
</div>

<script src="js/darkmode.js"></script>
