# Requêtes SQL

## Récupérer tous les produits

```sql
SELECT * FROM product
```

## Home

<details><summary>Les 5 catégories mises en avant</summary>

```sql
SELECT *
FROM category
WHERE home_order > 0
ORDER BY home_order
LIMIT 5
```

</details>

## Catégories Nav header

<details><summary>Les catégories dans le menu</summary>

```sql
SELECT * FROM category
```

</details>

## Marques Nav header

<details><summary>Les marques dans le menu</summary>

```sql
SELECT * FROM brand
```

</details>

## Types Nav header

<details><summary>Les types dans le menu</summary>

```sql
SELECT * FROM types
```

</details>

## Categories

<details><summary>Tous les produits de la catégorie #1 triés par nom croissant</summary>

```sql
SELECT *
FROM product
WHERE category_id = 1
ORDER BY name ASC
```

</details>
<details><summary>Tous les produits de la catégorie #1 triés par nom croissant</summary>

```sql
SELECT *
FROM product
WHERE category_id = 1
ORDER BY price ASC
```

</details>

## Marques

<details><summary>Tous les produits de la marque #2 triés par nom croissant</summary>

```sql
SELECT *
FROM product
WHERE brand_id = 2
ORDER BY name ASC
```

</details>
<details><summary>Tous les produits de la marque #2 triés par prix croissant</summary>

```sql
SELECT *
FROM product
WHERE brand_id = 2
ORDER BY price ASC
```

</details>

## Produits

<details><summary>Les infos sur le produit #1 + nom de la categorie + nom de la marque - EXEMPLE 1</summary>

```sql
SELECT product.*, category.name AS category_name, brand.name AS brand_name
FROM product
INNER JOIN category ON product.category_id = category.id
INNER JOIN brand ON product.brand_id = brand.id
WHERE product.id = 1;
```

</details>
<details><summary>Les infos sur le produit #1 + nom de la categorie + nom de la marque - EXEMPLE 2</summary>

```sql
SELECT product.*, brand.name AS brand_name, category.name AS category_name
FROM product
LEFT JOIN brand ON brand.id = product.brand_id
LEFT JOIN category ON category.id = product.category_id
WHERE product.id = 1
```

</details>