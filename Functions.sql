use quanlyhocsinh;

DELIMITER $$
CREATE PROCEDURE `DangKy` (
    IN p_TenDangNhap VARCHAR(30),
    IN p_MatKhau VARCHAR(15),
    IN p_HoTen NVARCHAR(50),
    IN p_SoDienThoai VARCHAR(10),
    IN p_GioiTinh NVARCHAR(5),
    IN p_NgaySinh DATE,
    IN p_ChucVu NVARCHAR(50)
)
BEGIN
    INSERT INTO TaiKhoan (TenDangNhap, MatKhau, HoTen, SoDienThoai, GioiTinh, NgaySinh, ChucVu)
    VALUES (p_TenDangNhap, p_MatKhau, p_HoTen, p_SoDienThoai, p_GioiTinh, p_NgaySinh, p_ChucVu);
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `DangNhap` (
    IN p_TenDangNhap VARCHAR(30),
    IN p_MatKhau VARCHAR(15)
)
BEGIN
    SELECT * FROM TaiKhoan WHERE TenDangNhap = p_TenDangNhap AND MatKhau = p_MatKhau;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE `SuaThongTinHocSinh` (
    IN p_MaHocSinh VARCHAR(10),
    IN p_HoTen VARCHAR(100),
    IN p_GioiTinh NVARCHAR(5),
    IN p_NgaySinh DATE,
    IN p_DiaChi VARCHAR(255),
    IN p_SDTPhuHuynh VARCHAR(10),
    IN p_MaLop VARCHAR(10)
)
BEGIN
    UPDATE HocSinh
    SET HoTen = p_HoTen,
        GioiTinh = p_GioiTinh,
        NgaySinh = p_NgaySinh,
        DiaChi = p_DiaChi,
        SDTPhuHuynh = p_SDTPhuHuynh,
        MaLop = p_MaLop
    WHERE MaHocSinh = p_MaHocSinh;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE `XoaHocSinh` (
    IN p_MaHocSinh VARCHAR(10)
)
BEGIN
    DELETE FROM HocSinh WHERE MaHocSinh = p_MaHocSinh;
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER `TruocKhiXoaHocSinh`
BEFORE DELETE ON `HocSinh` FOR EACH ROW
BEGIN
    DECLARE countDiem INT;
    SELECT COUNT(*) INTO countDiem FROM Diem WHERE MaHocSinh = OLD.MaHocSinh;
    IF countDiem > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Không thể xóa học sinh đã có điểm!';
    END IF;
END$$
DELIMITER ;


DELIMITER $$
drop procedure if exists ThemDiem;
CREATE PROCEDURE ThemDiem(
    IN p_MaHocSinh VARCHAR(10),
    IN p_MaMonHoc VARCHAR(10),
    IN p_DiemMieng FLOAT,
    IN p_Diem15Phut FLOAT,
    IN p_Diem1Tiet FLOAT,
    IN p_DiemHocKy FLOAT
)
BEGIN
    INSERT INTO Diem (MaHocSinh, MaMonHoc, DiemMieng, Diem15Phut, Diem1Tiet, DiemHocKy)
    VALUES (p_MaHocSinh, p_MaMonHoc, p_DiemMieng, p_Diem15Phut, p_Diem1Tiet, p_DiemHocKy);
END$$
DELIMITER ;



DELIMITER $$
drop procedure if exists ThemHocSinh;
CREATE PROCEDURE `ThemHocSinh` (
    IN p_MaHocSinh VARCHAR(10),
    IN p_HoTen VARCHAR(100),
    IN p_GioiTinh NVARCHAR(5),
    IN p_NgaySinh DATE,
    IN p_DiaChi VARCHAR(255),
    IN p_SDTPhuHuynh VARCHAR(10),
    IN p_MaLop VARCHAR(10)
)
BEGIN
    DECLARE v_Count INT;

    START TRANSACTION;
    
    -- Kiểm tra xem học sinh đã tồn tại chưa
    SELECT COUNT(*) INTO v_Count FROM HocSinh WHERE MaHocSinh = p_MaHocSinh;

    IF v_Count > 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Học sinh đã tồn tại.';
    ELSE
        -- Nếu chưa tồn tại, thêm mới học sinh
        INSERT INTO HocSinh (MaHocSinh, HoTen, GioiTinh, NgaySinh, DiaChi, SDTPhuHuynh, MaLop)
        VALUES (p_MaHocSinh, p_HoTen, p_GioiTinh, p_NgaySinh, p_DiaChi, p_SDTPhuHuynh, p_MaLop);
    END IF;

    COMMIT;
END$$
DELIMITER ;





