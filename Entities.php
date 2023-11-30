<?php
    class Category{
        private $id;
        private $name;

        /**
         * Get the value of id
         */
        public function getId() {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self {
                $this->id = $id;
                return $this;
        }

        /**
         * Get the value of name
         */
        public function getName() {
                return $this->name;
        }

        /**
         * Set the value of name
         */
        public function setName($name): self {
                $this->name = $name;
                return $this;
        }
    }
    class Product{
        private $id;
        private $name;
        private $description;
        private $picture;
        private Category $category;

        /**
         * Get the value of id
         */
        public function getId() {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self {
                $this->id = $id;
                return $this;
        }

        /**
         * Get the value of name
         */
        public function getName() {
                return $this->name;
        }

        /**
         * Set the value of name
         */
        public function setName($name): self {
                $this->name = $name;
                return $this;
        }

        /**
         * Get the value of description
         */
        public function getDescription() {
                return $this->description;
        }

        /**
         * Set the value of description
         */
        public function setDescription($description): self {
                $this->description = $description;
                return $this;
        }

        /**
         * Get the value of picture
         */
        public function getPicture() {
                return $this->picture;
        }

        /**
         * Set the value of picture
         */
        public function setPicture($picture): self {
                $this->picture = $picture;
                return $this;
        }
                
        /**CAMBIAR!!
         * Get the value of category
         *
         * @return Category
         */
        public function getCategory(): Category {
                return $this->category->getId();
        }

        /**
         * Set the value of category
         *
         * @param Category $category
         *
         * @return self
         */
        public function setCategory(Category $id): self {
                $this->category->setId($id);

                return $this;
        }
    }
    class User{
        private $id;
        private $dni;
        private $name;
        private $address;
        private $login;
        private $password;

        /**
         * Get the value of id
         */
        public function getId() {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self {
                $this->id = $id;
                return $this;
        }

        /**
         * Get the value of dni
         */
        public function getDni() {
                return $this->dni;
        }

        /**
         * Set the value of dni
         */
        public function setDni($dni): self {
                $this->dni = $dni;
                return $this;
        }

        /**
         * Get the value of address
         */
        public function getAddress() {
                return $this->address;
        }

        /**
         * Set the value of address
         */
        public function setAddress($address): self {
                $this->address = $address;
                return $this;
        }

        /**
         * Get the value of login
         */
        public function getLogin() {
                return $this->login;
        }

        /**
         * Set the value of login
         */
        public function setLogin($login): self {
                $this->login = $login;
                return $this;
        }

        /**
         * Get the value of password
         */
        public function getPassword() {
                return $this->password;
        }

        /**
         * Set the value of password
         */
        public function setPassword($password): self {
                $this->password = $password;
                return $this;
        }

        /**
         * Get the value of name
         */
        public function getName() {
                return $this->name;
        }

        /**
         * Set the value of name
         */
        public function setName($name): self {
                $this->name = $name;
                return $this;
        }
    }

?>