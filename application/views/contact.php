		<!-- Contact & map etc-->
        <div class="container">
            <h2><?php echo lang("CONTACT_PAGE_TITLE"); ?></h2>
                       
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nimi</th>
                  <th>Telefon</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Andrus Lall</td>
                  <td>5581148</td>
                  <td>andruslall@outlook.com</td>
                </tr>
                <tr>
                  <td>Toomas Veromann</td>
                  <td>58228076</td>
                  <td>toomasveromann@gmail.com</td>
                </tr>
                <tr>
                  <td>Ako Tõnissoo</td>
                  <td>53533329</td>
                  <td>ako.tonissoo@gmail.com</td>
                </tr>
              </tbody>
            </table>
            
            <div id="googleMap" style="height:350px;"></div>
            <script src="/js/googleMap.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb38Ul4HJ-GAKgKCWoo492ASn6_A-lRX4&callback=myMap"></script>
        </div>
        