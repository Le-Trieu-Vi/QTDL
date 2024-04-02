<?php
function search_hocsinh($tukhoa){
        include "dbconnect.php"; 
        
        try {
            $sql = "CALL search_hocsinh(:tukhoa)"; 
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':tukhoa', $tukhoa, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
            return $result; 
    
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }