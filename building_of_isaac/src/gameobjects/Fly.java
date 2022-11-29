package gameobjects;
import java.time.Duration;
import java.time.Instant;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;

import gameWorld.GameWorld;
import gameobjects.Tear;
import libraries.StdDraw;
import libraries.Timer;
import libraries.Vector2;
import resources.DisplaySettings;
import resources.HeroInfos;
import resources.ImagePaths;
import resources.RoomInfos;
import resources.MonsterInfos;

public class Fly extends Personage
{

	private double TirVertical = 0;
	private double TirHorizontal = 0;
	public double getTirVertical() {
		return TirVertical;
	}
	
	public static double generate() {
		double randomValue = new Random().nextDouble();
		if(randomValue<0.7 && randomValue>0.3 || randomValue<0.1 || randomValue>0.9) {
			randomValue = generate();
		}
		return randomValue;
	}
	
	public Fly(Vector2 size, double speed, String imagePath, double carry, int point, int damage)
	{
		super(new Vector2(generate(), generate()),size,speed,imagePath,carry,point,damage);
	}
	
	public void updateGameObject()
	{
		move();
	}
	
	protected void move()
	{
		Vector2 normalizedDirection = getNormalizedDirection();
		Vector2 positionAfterMoving = getPosition().addVector(normalizedDirection);
			setPosition(new Vector2(positionAfterMoving.getX()+TirHorizontal, positionAfterMoving.getY()+TirVertical));
			direction = new Vector2();
		
	}
	
	public void deplacements (Hero hero) {
		this.TirHorizontal = (hero.getPosition().getX() - this.getPosition().getX())*speed;
		this.TirVertical = (hero.getPosition().getY() - this.getPosition().getY())*speed;
		this.time2 = ((System.nanoTime()-this.startime)/1000000000);
		if(this.time2>1) {
			if(Math.abs(hero.getPosition().getX() - this.getPosition().getX())<0.3) {
				Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, MonsterInfos.TEAR_SPEED, ImagePaths.TEAR,this.TirVertical*900,this.TirHorizontal*900);
				this.tearList.add(bal);
			}
			else if(Math.abs(hero.getPosition().getX() - this.getPosition().getX())<0.6) {
				Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, MonsterInfos.TEAR_SPEED, ImagePaths.TEAR,this.TirVertical*500,this.TirHorizontal*400);
				this.tearList.add(bal);
			}
			else {
				Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, MonsterInfos.TEAR_SPEED, ImagePaths.TEAR,this.TirVertical*200,this.TirHorizontal*200);
				this.tearList.add(bal);
			}
			
			//System.out.println(hero.getPosition().getX() - this.getPosition().getX());
			this.time2 = 0;
			this.startime = System.nanoTime();
		}
	}
}
