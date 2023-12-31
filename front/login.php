<fieldset>
  <legend>會員登入</legend>
  <table>
    <tr>
      <td class=clo>帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td class=clo>密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="登入" onclick="login()">
        <input type="reset" value="清除">
      </td>
      <td>
        <a href="?do=forget">忘記密碼</a> | <a href="?do=register">尚未註冊</a>
      </td>
    </tr>
  </table>
</fieldset>
<script>
function login() {
  $.post("./api/check_acc.php", {
    acc: $("#acc").val()
  }, (res) => {
    if (res == 1) {
      $.post("./api/check_pw.php", {
        acc: $("#acc").val(),
        pw: $("#pw").val()
      }, (res) => {
        if (res == 1) {
          if ($("#acc").val() == "admin") {
            location.href = "back.php"
          } else {
            location.href = "index.php"
          }
        } else {
          alert("密碼錯誤")
        }
      })
    } else {
      alert("查無帳號")
    }
  })
}
</script>