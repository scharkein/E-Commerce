import cv2
import numpy as np

# Charger l'image avec fond blanc
image = cv2.imread('5_0.png')

# Convertir l'image en niveaux de gris
gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

# Appliquer un seuillage pour détecter le fond blanc
_, mask = cv2.threshold(gray, 240, 255, cv2.THRESH_BINARY)

# Inverser le masque
mask_inv = cv2.bitwise_not(mask)

# Appliquer le masque inverse à l'image originale
image_without_bg = cv2.bitwise_and(image, image, mask=mask_inv)

# Enregistrer l'image sans fond blanc dans le même fichier
cv2.imwrite('5_0--.png', image_without_bg)

print("L'image sans fond a été enregistrée avec succès dans le fichier 'image_sans_fond.jpg'.")
