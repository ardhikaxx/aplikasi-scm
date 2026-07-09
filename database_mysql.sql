CREATE DATABASE IF NOT EXISTS rantai_pasokan;
USE rantai_pasokan;

CREATE TABLE supplier (
    id_supplier   INT           AUTO_INCREMENT PRIMARY KEY,
    nama_supplier VARCHAR(255)  NOT NULL,
    alamat       TEXT,
    telepon      VARCHAR(50),
    email        VARCHAR(100)
);

CREATE TABLE kategori_produk (
    id_kategori   INT          AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(255) NOT NULL
);

CREATE TABLE satuan_ukur (
    id_satuan   INT          AUTO_INCREMENT PRIMARY KEY,
    nama_satuan VARCHAR(255) NOT NULL
);

CREATE TABLE produk (
    id_produk     INT           AUTO_INCREMENT PRIMARY KEY,
    nama_produk   VARCHAR(255)  NOT NULL,
    id_kategori   INT           NOT NULL,
    id_satuan     INT           NOT NULL,
    harga_beli    DECIMAL(12,2) NOT NULL,
    harga_jual    DECIMAL(12,2) NOT NULL,
    stok          INT           NOT NULL DEFAULT 0,
    reorder_point INT           NOT NULL DEFAULT 10,
    FOREIGN KEY (id_kategori) REFERENCES kategori_produk(id_kategori),
    FOREIGN KEY (id_satuan) REFERENCES satuan_ukur(id_satuan)
);

CREATE TABLE purchase_order (
    id_po       INT           AUTO_INCREMENT PRIMARY KEY,
    tanggal     DATE          NOT NULL,
    id_supplier INT           NOT NULL,
    total       DECIMAL(14,2) NOT NULL,
    FOREIGN KEY (id_supplier) REFERENCES supplier(id_supplier)
);

CREATE TABLE penerimaan_barang (
    id_penerimaan INT  AUTO_INCREMENT PRIMARY KEY,
    id_po         INT  NOT NULL,
    tanggal       DATE NOT NULL,
    keterangan    TEXT,
    FOREIGN KEY (id_po) REFERENCES purchase_order(id_po)
);

CREATE TABLE detail_penerimaan (
    id_detail       INT           AUTO_INCREMENT PRIMARY KEY,
    id_penerimaan   INT           NOT NULL,
    id_produk       INT           NOT NULL,
    jumlah          INT           NOT NULL,
    harga           DECIMAL(12,2) NOT NULL,
    subtotal        DECIMAL(14,2) NOT NULL,
    FOREIGN KEY (id_penerimaan) REFERENCES penerimaan_barang(id_penerimaan),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);

CREATE TABLE sales_order (
    id_so          INT          AUTO_INCREMENT PRIMARY KEY,
    tanggal        DATE         NOT NULL,
    nama_customer  VARCHAR(255) NOT NULL,
    status         VARCHAR(50)  NOT NULL DEFAULT 'Pending'
);

CREATE TABLE detail_so (
    id_detail    INT          AUTO_INCREMENT PRIMARY KEY,
    id_so        INT          NOT NULL,
    nama_produk  VARCHAR(255) NOT NULL,
    jumlah       INT          NOT NULL,
    FOREIGN KEY (id_so) REFERENCES sales_order(id_so)
);

CREATE TABLE mutasi (
    id_mutasi     INT          AUTO_INCREMENT PRIMARY KEY,
    tanggal       DATE         NOT NULL,
    nama_produk   VARCHAR(255) NOT NULL,
    jenis_mutasi  VARCHAR(20)  NOT NULL,
    jumlah        INT          NOT NULL,
    keterangan    TEXT
);
