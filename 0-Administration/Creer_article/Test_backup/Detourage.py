import cv2
import numpy as np

# Chargement de l'image avec un canal alpha initialisé à zéro (fond transparent)
image = cv2.imread("5_0.png", cv2.IMREAD_UNCHANGED)

# Conversion de l'image en niveaux de gris
gray = cv2.cvtColor(image[:, :, :3], cv2.COLOR_BGR2GRAY)

# Seuillage pour obtenir un masque binaire inversé
_, mask = cv2.threshold(gray, 240, 255, cv2.THRESH_BINARY)
mask_inv = cv2.bitwise_not(mask)

# Application du masque sur l'image originale pour rendre le fond transparent
image[:, :, 3] = mask_inv

# Affichage de l'image avec le fond transparent
cv2.imshow("Image avec Fond Transparent", image)
cv2.waitKey(0)
cv2.destroyAllWindows()

# Enregistrement de l'image avec le fond transparent avec un nouveau nom
nom_nouvelle_image = "objet_principal_fond_transparent.png"
cv2.imwrite(nom_nouvelle_image, image)

print(f"L'image avec le fond transparent a été enregistrée avec le nom '{nom_nouvelle_image}' dans le même dossier que votre script.")
