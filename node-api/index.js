const express = require("express");
const bodyParser = require("body-parser");
const authRoutes = require("./routes/auth");
const userRoutes = require("./routes/users");
const employeeRoutes = require("./routes/employees");

const app = express();

app.use(bodyParser.json());
app.use("/auth", authRoutes);
app.use("/users", userRoutes);
app.use("/employees", employeeRoutes);

const PORT = process.env.PORT || 3000;

app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
