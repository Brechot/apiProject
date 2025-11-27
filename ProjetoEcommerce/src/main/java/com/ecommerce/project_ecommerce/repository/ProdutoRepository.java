package com.ecommerce.project_ecommerce.repository;

import com.ecommerce.project_ecommerce.model.Produto;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ProdutoRepository extends JpaRepository<Produto, Long>{

}
