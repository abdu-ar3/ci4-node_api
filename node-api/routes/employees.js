const express = require("express");
const router = express.Router();
const employeeController = require("../controllers/employeeController");
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

router.get("/", employeeController.getEmployees);
router.post("/", upload.single("photo"), employeeController.createEmployee);
router.put("/", upload.single("photo"), employeeController.updateEmployee);
router.delete("/", employeeController.deleteEmployee);

module.exports = router;
