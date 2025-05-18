<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
#request th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

/* tr:nth-child(even) {
  background-color: #dddddd;
} */
</style>


<title>DB ACCESS</title>
</head>
<body>

<div class="container" style="padding-top:100px;">
    
     <!-- <h1>Form</h1>
        <table class="table" id="request">
			<tbody>
				<tr>
					<th> Select<br> <input type="checkbox" class="select_all_items"></td>
					<th>Id</th>
					<th>City</th>
					<th>Country</th>
                    <th>API</th>
				</tr>
                <td><input type="checkbox" class="item_id" option_id="1"> </td>
					<td>1</td>
					<td>Delhi</td>
                    <td>India</td>
					<td></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="item_id" option_id="2"> </td>
					<td>2</td>
					<td>Dhaka</td>
                    <td>Bangladesh</td>
					<td>124</td>
				</tr>

                <tr>
                <td><input type="checkbox" class="item_id" option_id="3"></td>
                <td>3</td>
                <td>Tokyo</td>
                <td>Japan</td>
                <td>78</td>
                </tr>
   
                <tr>
                <td><input type="checkbox" class="item_id" option_id="4"></td>
                <td>4</td>
                <td>New York</td>
                <td>United States</td>
                <td>89</td>
                </tr>
    
              <tr>
                    <td><input type="checkbox" class="item_id" option_id="5"></td>
                    <td>5</td>
                    <td>London</td>
                    <td>United Kingdom</td>
                    <td>92</td>
             </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="6"></td>
        <td>6</td>
        <td>Paris</td>
        <td>France</td>
        <td>85</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="7"></td>
        <td>7</td>
        <td>Sydney</td>
        <td>Australia</td>
        <td>66</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="8"></td>
        <td>8</td>
        <td>Toronto</td>
        <td>Canada</td>
        <td>72</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="9"></td>
        <td>9</td>
        <td>Berlin</td>
        <td>Germany</td>
        <td>80</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="10"></td>
        <td>10</td>
        <td>Moscow</td>
        <td>Russia</td>
        <td>102</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="11"></td>
        <td>11</td>
        <td>Beijing</td>
        <td>China</td>
        <td>210</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="12"></td>
        <td>12</td>
        <td>Cairo</td>
        <td>Egypt</td>
        <td>165</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="13"></td>
        <td>13</td>
        <td>Rio de Janeiro</td>
        <td>Brazil</td>
        <td>95</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="14"></td>
        <td>14</td>
        <td>Johannesburg</td>
        <td>South Africa</td>
        <td>108</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="15"></td>
        <td>15</td>
        <td>Mexico City</td>
        <td>Mexico</td>
        <td>134</td>
    </tr>
   
    <tr>
        <td><input type="checkbox" class="item_id" option_id="16"></td>
        <td>16</td>
        <td>Madrid</td>
        <td>Spain</td>
        <td>91</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="17"></td>
        <td>17</td>
        <td>Seoul</td>
        <td>South Korea</td>
        <td>132</td>
    </tr>
   
    <tr>
        <td><input type="checkbox" class="item_id" option_id="18"></td>
        <td>18</td>
        <td>Jakarta</td>
        <td>Indonesia</td>
        <td>147</td>
    </tr>
    
    <tr>
        <td><input type="checkbox" class="item_id" option_id="19"></td>
        <td>19</td>
        <td>Istanbul</td>
        <td>Turkey</td>
        <td>104</td>
    </tr>

    <tr>
        <td><input type="checkbox" class="item_id" option_id="20"></td>
        <td>20</td>
        <td>Lagos</td>
        <td>Nigeria</td>
        <td>170</td>
    </tr>

                

                
				
                
				
			</tbody>
		</table>
        <button onclick="submitSelection()">Submit</button>

</div>



<script>
  function toggleAll(source) {
    const checkboxes = document.querySelectorAll('.item_id');
    checkboxes.forEach(cb => cb.checked = source.checked);

    const checked = document.querySelectorAll('.item_id:checked');
    if (checked.length < 10) {
        alert('You must select at least 10 rows.');
        source.checked = false;
        checkboxes.forEach(cb => cb.checked = false);
    }
  }

  function submitSelection() {
    const checkedItems = document.querySelectorAll('.item_id:checked');
    if (checkedItems.length < 10) {
        alert('You must select at least 10 rows before submitting.');
        return;
    }

    const selectedIds = Array.from(checkedItems).map(cb => cb.getAttribute('option_id'));
    alert('Submitted IDs: ' + selectedIds.join(', '));
    // Here you can send selectedIds to a server or process them further
  }
</script> -->

<form action="showaqi.php" method="post" onsubmit="return validateSelection()">
  <table>
    <tbody>
        <tr>
            <th>Select<br> <input type="checkbox" class="select_all_items" onchange="toggleAll(this)"></th>
            <th>Id</th>
            <th>City</th>
            <th>Country</th>
            <th>API</th>
        </tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="1" class="item_id"></td><td>1</td><td>Delhi</td><td>India</td><td>185</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="2" class="item_id"></td><td>2</td><td>Dhaka</td><td>Bangladesh</td><td>124</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="3" class="item_id"></td><td>3</td><td>Tokyo</td><td>Japan</td><td>78</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="4" class="item_id"></td><td>4</td><td>New York</td><td>United States</td><td>89</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="5" class="item_id"></td><td>5</td><td>London</td><td>United Kingdom</td><td>92</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="6" class="item_id"></td><td>6</td><td>Paris</td><td>France</td><td>85</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="7" class="item_id"></td><td>7</td><td>Sydney</td><td>Australia</td><td>66</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="8" class="item_id"></td><td>8</td><td>Toronto</td><td>Canada</td><td>72</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="9" class="item_id"></td><td>9</td><td>Berlin</td><td>Germany</td><td>80</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="10" class="item_id"></td><td>10</td><td>Moscow</td><td>Russia</td><td>102</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="11" class="item_id"></td><td>11</td><td>Beijing</td><td>China</td><td>210</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="12" class="item_id"></td><td>12</td><td>Cairo</td><td>Egypt</td><td>165</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="13" class="item_id"></td><td>13</td><td>Rio de Janeiro</td><td>Brazil</td><td>95</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="14" class="item_id"></td><td>14</td><td>Johannesburg</td><td>South Africa</td><td>108</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="15" class="item_id"></td><td>15</td><td>Mexico City</td><td>Mexico</td><td>134</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="16" class="item_id"></td><td>16</td><td>Madrid</td><td>Spain</td><td>91</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="17" class="item_id"></td><td>17</td><td>Seoul</td><td>South Korea</td><td>132</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="18" class="item_id"></td><td>18</td><td>Jakarta</td><td>Indonesia</td><td>147</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="19" class="item_id"></td><td>19</td><td>Istanbul</td><td>Turkey</td><td>104</td></tr>
        <tr><td><input type="checkbox" name="selected_ids[]" value="20" class="item_id"></td><td>20</td><td>Lagos</td><td>Nigeria</td><td>170</td></tr>
    </tbody>
  </table>

  <button type="submit">Submit</button>
</form>

<script>
  function toggleAll(source) {
    const checkboxes = document.querySelectorAll('.item_id');
    checkboxes.forEach(cb => cb.checked = source.checked);

    const checked = document.querySelectorAll('.item_id:checked');
    if (checked.length < 10) {
        alert('You must select at least 10 rows.');
        source.checked = false;
        checkboxes.forEach(cb => cb.checked = false);
    }
  }

  function validateSelection() {
    const checkedItems = document.querySelectorAll('.item_id:checked');
    if (checkedItems.length < 10) {
        alert('You must select at least 10 rows before submitting.');
        return false;
    }
    return true;
  }
</script>






</body>
</html>

