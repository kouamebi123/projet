package gameobjects;

import java.util.Arrays;
import java.util.List;
import java.util.Random;
import gameobjects.Personage;
import libraries.Physics;
import libraries.StdDraw;
import libraries.Vector2;
import resources.Controls;
import resources.ImagePaths;
import resources.RoomInfos;

public class Obstacle {

	private Vector2 position;
	private Vector2 size;
	private String imagePath;
	private String type;
	private int Damage;
	private boolean ok;
	
	public Obstacle(Vector2 size,Hero hero){
		this.size = size;
		this.Damage = 1;
		this.ok = true;
		this.position = ProvisionalPosition(hero);
		ChoiceType();
	}
	
	public void ChoiceType() {
		List<String> Lists = Arrays.asList("rocks", "pikes");
	    int randomIndex = new Random().nextInt(Lists.size());
	    String randomElement = Lists.get(randomIndex);
	    if(randomElement == "rocks") {
	    	this.type = "rocks";
	    	this.imagePath = ImagePaths.ROCK;	
	    }
	    else {
	    	this.type = "pikes";
	    	this.imagePath = ImagePaths.SPIKES;
	    }
	    
	}
	
	public void drawGameObject()
	{
		StdDraw.picture(this.position.getX(), this.position.getY(), this.imagePath, this.size.getX(), this.size.getY(),
				0);
	}
	public static double generate() {
		double randomValue = new Random().nextDouble();
		if(randomValue<0.2 || randomValue>0.8 ) {
			randomValue = generate();
		}
		return randomValue;
	}
	public Vector2 ProvisionalPosition(Hero hero) {
		Vector2 pos = new Vector2(generate(), generate());
		if((pos.getX()<0.3 && pos.getY()<0.7 && pos.getY()>0.3) || (pos.getX()>0.7 && pos.getY()<0.7 && pos.getY()>0.3) || (pos.getY()>0.7 && pos.getX()<0.7 && pos.getX()>0.3) || (pos.getY()<0.3 && pos.getX()<0.7 && pos.getX()>0.3)){
			return ProvisionalPosition(hero);
		}
		if(Physics.rectangleCollision(hero.getPosition(), hero.getSize(), pos,this.size )) {
			return ProvisionalPosition(hero);
		};
		return pos;
		
	}

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

	public int getDamage() {
		return Damage;
	}

	public void setNombre(int Damage) {
		this.Damage = Damage;
	}
	
	public void Blocage(Object pers) {
		if(this.type == "rocks") {
			double authorizedOverlap = RoomInfos.TILE_WIDTH / 1000;
			boolean tooFarLeft = ((Personage) pers).getPosition().getX() + (((Personage) pers).size.getX() / 2) < authorizedOverlap + this.position.getX() - (this.size.getX() / 2);
			boolean tooFarBelow = ((Personage) pers).getPosition().getY() + (((Personage) pers).size.getY() / 2) < authorizedOverlap + this.position.getY() - (this.size.getY() / 2);
			boolean tooFarRight = ((Personage) pers).getPosition().getX() - (((Personage) pers).size.getX() / 2) + authorizedOverlap > this.position.getX() + (this.size.getX() / 2);
			boolean tooFarAbove = ((Personage) pers).getPosition().getY() - (((Personage) pers).size.getY() / 2) + authorizedOverlap > this.position.getY() + (this.size.getY() / 2);
			if (!tooFarLeft && !tooFarBelow && !tooFarAbove && StdDraw.isKeyPressed(Controls.goRight) && !tooFarRight)
			{
				((Personage) pers).setOkdeplacement(false);
			}
			else if (!tooFarRight && !tooFarBelow && !tooFarAbove && StdDraw.isKeyPressed(Controls.goLeft) && !tooFarLeft)
			{
				((Personage) pers).setOkdeplacement(false);
			}
			else if (!tooFarRight && !tooFarBelow && !tooFarAbove && StdDraw.isKeyPressed(Controls.goUp) && !tooFarLeft)
			{
				((Personage) pers).setOkdeplacement(false);
			}
			else if (!tooFarRight && !tooFarBelow && !tooFarAbove && StdDraw.isKeyPressed(Controls.goDown) && !tooFarLeft)
			{
				((Personage) pers).setOkdeplacement(false);
			}
			else {
				((Personage) pers).setOkdeplacement(true);
			}
			
		};
			
	}
	
	public void Damage(Object pers) {
		if(this.type == "pikes") {
			if(Physics.rectangleCollision(((Personage) pers).getPosition(),((Personage) pers).getSize(),this.position,this.size)){
				if(!((Personage) pers).isContact()) {
					if(((Personage) pers).getPoint()-this.getDamage()<0) {
						((Personage) pers).setPoint(0);
					}
					else {
						((Personage) pers).setPoint(((Personage) pers).getPoint()-this.getDamage());
					}
					((Personage) pers).setImagePath(ImagePaths.GAPER);
					((Personage) pers).setContact(true);
					//System.out.println(hero.getPoint());
				}
			}
		
		}
	}
	
	
}
