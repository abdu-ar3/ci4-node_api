const db = require("../config/db");
const bcrypt = require("bcrypt");

exports.getUsers = (req, res) => {
  db.query("SELECT * FROM users", (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

exports.createUser = (req, res) => {
  const { username, password } = req.body;
  const hashedPassword = bcrypt.hashSync(password, 10);
  db.query(
    "INSERT INTO users (username, password) VALUES (?, ?)",
    [username, hashedPassword],
    (err, results) => {
      if (err) throw err;
      res.json({ success: true, message: "User created" });
    }
  );
};

exports.updateUser = (req, res) => {
  const { id, username, password } = req.body;
  let query = "UPDATE users SET username = ?";
  let values = [username];
  if (password) {
    const hashedPassword = bcrypt.hashSync(password, 10);
    query += ", password = ?";
    values.push(hashedPassword);
  }
  query += " WHERE id = ?";
  values.push(id);
  db.query(query, values, (err, results) => {
    if (err) throw err;
    res.json({ success: true, message: "User updated" });
  });
};

exports.deleteUser = (req, res) => {
  const { id } = req.body;
  db.query("DELETE FROM users WHERE id = ?", [id], (err, results) => {
    if (err) throw err;
    res.json({ success: true, message: "User deleted" });
  });
};
