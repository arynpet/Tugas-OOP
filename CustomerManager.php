<?php

class CustomerManager {
    private $dataFile = 'customer_data.json';
    private $customerList = [];

    public function __construct() {
        if (file_exists($this->dataFile)) {
            $data = file_get_contents($this->dataFile);
            $this->customerList = json_decode($data, true) ?? [];
        }
    }

    // Menambahkan pelanggan baru
    public function tambahCustomer($nama, $alamat, $telepon) {
        $id = uniqid(); // Generate ID unik
        $customer = [
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon
        ];
        $this->customerList[] = $customer;
        $this->simpanData();
    }

    // Mendapatkan semua pelanggan
    public function getCustomers() {
        return $this->customerList;
    }

    // Menghapus pelanggan berdasarkan ID
    public function hapusCustomer($id) {
        $this->customerList = array_filter($this->customerList, function($customer) use ($id) {
            return $customer['id'] !== $id;
        });
        $this->simpanData();
    }

    // Menyimpan data ke file JSON
    private function simpanData() {
        file_put_contents($this->dataFile, json_encode($this->customerList, JSON_PRETTY_PRINT));
    }
}
?>