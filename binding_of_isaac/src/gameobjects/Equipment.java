package gameobjects;

import java.util.Arrays;
import java.util.List;
import java.util.Random;

import libraries.Physics;
import libraries.StdDraw;
import libraries.Vector2;
import resources.ImagePaths;

public class Equipment {

	private Vector2 position;
	private Vector2 size;
	private String imagePath;
	private String type;
	private int nombre;
	
	public Equipment(Vector2 size,Hero hero){
		this.size = size;
		this.position = ProvisionalPosition(hero);
		ChoiceType();
	}
	
	/*
	 * Choix de type d'equipement
	 */
	public void ChoiceType() {
		List<String> ListConsumables = Arrays.asList("coin", "full_heart", "half_full_heart");
	    int randomIndex = new Random().nextInt(ListConsumables.size());
	    String randomElement = ListConsumables.get(randomIndex);
	    if(randomElement == "coin") {
	    	this.type = "coin";
	    	this.imagePath = ImagePaths.COIN;
		    this.nombre = new Random().nextInt(15)+1;	
	    }
	    else if(randomElement == "full_heart") {
	    	this.type = "full_heart";
	    	this.imagePath = ImagePaths.HEART_HUD;
		    this.nombre = 2;
	    }
	    else {
	    	this.type = "half_full_heart";
	    	this.imagePath = ImagePaths.HALF_HEART_HUD;
		    this.nombre = 1;
	    }
	    
	}
	
	public void drawGameObject()
	{
		StdDraw.picture(this.position.getX(), this.position.getY(), this.imagePath, this.size.getX(), this.size.getY(),
				0);
	}
	
	/*
	 * Generateur de coordonnée;
	 */
	public static double generate() {
		double randomValue = new Random().nextDouble();
		if(randomValue<0.1 || randomValue>0.9) {
			randomValue = generate();
		}
		return randomValue;
	}
	
	/*
	 * Position de position;
	 */
	public Vector2 ProvisionalPosition(Hero hero) {
		Vector2 pos = new Vector2(generate(), generate());
		if(Physics.rectangleCollision(hero.getPosition(), hero.getSize(), pos,this.size )) {
			return ProvisionalPosition(hero);
		};
		return pos;
		
	}
	
	/*
	 * Getters et setters
	 */
	public Vector2 getPosition() {
		return position;
	}

	public void setPosition(Vector2 position) {
		this.position = position;
	}

	public Vector2 getSize() {
		return size;
	}

	public void setSize(Vector2 size) {
		this.size = size;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public int getNombre() {
		return nombre;
	}

	public void setNombre(int nombre) {
		this.nombre = nombre;
	}
	
	
}
