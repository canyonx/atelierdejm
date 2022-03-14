<?php

namespace App\Controller;

use App\Repository\IllustrationRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * Boutique, tous les produits
     * @Route("/nos-produits", name="products")
     */
    public function index(
        ProductRepository $productRepository
    ): Response {
        $products = $productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * Voir un produit
     * @Route("/nos-produits/{slug}", name="product_show")
     */
    public function show(
        $slug,
        ProductRepository $productRepository,
        IllustrationRepository $illustrationRepository
    ): Response {
        $product = $productRepository->findOneBySlug($slug);

        if (!$product) {
            return $this->redirectToRoute('products');
        }

        $images = $illustrationRepository->findByProduct($product);

        return $this->render('product/show.html.twig', [
            'product' => $product,
            'images' => $images
        ]);
    }
}
