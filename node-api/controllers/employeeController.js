const db = require("../config/db");
const multer = require("multer");
const path = require("path");

// Konfigurasi Multer
const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, path.join(__dirname, "../../public/uploads"));
  },
  filename: function (req, file, cb) {
    const uniqueSuffix = Date.now() + "-" + Math.round(Math.random() * 1e9);
    const ext = path.extname(file.originalname);
    cb(null, file.fieldname + "-" + uniqueSuffix + ext);
  },
});

const upload = multer({ storage: storage });

exports.getEmployees = (req, res) => {
  db.query("SELECT * FROM employees", (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

exports.createEmployee = (req, res) => {
  const { name, email } = req.body;
  let photo = null;
  if (req.file) {
    photo = req.file.filename;
  }
  db.query(
    "INSERT INTO employees (name, email, photo) VALUES (?, ?, ?)",
    [name, email, photo],
    (err, results) => {
      if (err) throw err;
      res.json({ success: true, message: "Employee created" });
    }
  );
};

exports.updateEmployee = (req, res) => {
  const { id, name, email } = req.body;
  let query = "UPDATE employees SET name = ?, email = ?";
  let values = [name, email];
  if (req.file) {
    query += ", photo = ?";
    values.push(req.file.filename);
  }
  query += " WHERE id = ?";
  values.push(id);
  db.query(query, values, (err, results) => {
    if (err) throw err;
    res.json({ success: true, message: "Employee updated" });
  });
};

exports.deleteEmployee = (req, res) => {
  const { id } = req.body;
  db.query("DELETE FROM employees WHERE id = ?", [id], (err, results) => {
    if (err) throw err;
    res.json({ success: true, message: "Employee deleted" });
  });
};
