const db = require("../config/db");
const bcrypt = require("bcrypt");

exports.login = (req, res) => {
  const { username, password } = req.body;
  console.log("Login request received");
  console.log("Username:", username);
  db.query(
    "SELECT * FROM users WHERE username = ?",
    [username],
    (err, results) => {
      if (err) {
        console.log("Database error:", err);
        throw err;
      }
      console.log("Database results:", results);
      if (results.length && bcrypt.compareSync(password, results[0].password)) {
        res.json({ success: true, message: "Login successful" });
      } else {
        res.json({ success: false, message: "Invalid credentials" });
      }
    }
  );
};
