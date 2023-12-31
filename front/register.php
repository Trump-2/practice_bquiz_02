<fieldset>
  <legend>會員註冊</legend>
  <span style="color:red">*請設定您要註冊的帳號及密碼 ( 最長 12 個字元 )</span>
  <table>
    <tr>
      <td class=clo>Step1:登入帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td class=clo>Step2:登入密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td class=clo>Step3:再次確認密碼</td>
      <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
      <td class=clo>Step4:信箱(忘記密碼時使用)</td>
      <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="註冊" onclick="reg()">
        <input type="reset" value="清除">
      </td>
    </tr>
  </table>
</fieldset>

<script>
function reg() {
  let user = {
    acc: $("#acc").val(),
    pw: $("#pw").val(),
    pw2: $("#pw2").val(),
    email: $("#email").val()
  }

  // console.log(user);
  if (user.acc !== "" && user.pw !== "" && user.pw2 !== "" && user.email !== "") { // 先檢查各欄位是否空白
    if (user.pw === user.pw2) { // 判斷兩次輸入的密碼是否不同
      $.post("./api/check_acc.php", {
        acc: user.acc
      }, (res) => {
        console.log(res)
        if (res == 1) {
          alert("帳號重複")
        } else {
          $.post("./api/register.php", user, (res) => {
            alert("註冊完成，歡迎加入") // 這段這樣寫比較冒險，但為了檢定
          })
        }
      })
    } else {
      alert("密碼錯誤")
    }
  } else {
    alert("不可為空白")
  }
}
</script>